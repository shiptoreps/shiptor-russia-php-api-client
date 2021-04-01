<?php
namespace ShiptorRussiaApiClient\Client\Core;

use GuzzleHttp\Client as GuzzleClient,
    GuzzleHttp\Exception\BadResponseException,
    ShiptorRussiaApiClient\Client\Core\Configuration;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

abstract class Client implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    protected $apiUrl;
    protected $client;
    protected $headers = [];
    protected $last_ts = 0;
    protected static $instances = null;

    abstract protected function setApiUrl();
    protected function __construct(){
        $this->setApiUrl();
        $this->client = new GuzzleClient();
        $this->logger = new NullLogger();
    }
    final public static function getInstance(){
        $calledClass = get_called_class();
        if (!isset(static::$instances[$calledClass])){
            $instance = new $calledClass();
            if ($instance instanceof LoggerAwareInterface) {
                $instance->setLogger(Configuration::getLogger());
            }
            static::$instances[$calledClass] = $instance;
        }
        return static::$instances[$calledClass];
    }
    protected function setHeaders(){
        $this->headers = [
            'content-type' => 'application/json',
            'Integration-Name' => Configuration::getName()
        ];
        if(Configuration::getVersion()){
            $this->headers['Integration-Version'] = Configuration::getVersion();
        }
    }
    public function call($method, $params = array()){
        $this->setHeaders();
        $data = array(
            'jsonrpc' => '2.0',
            'method' => $method,
            'params' => $params,
            'id' => rand(1000,9999)
        );
        try {
            $this->waitMinimumMsInterval();
            $request = $this->client->post($this->apiUrl, [
                'headers' => $this->headers,
                'body' => json_encode($data),
            ]);
            $this->setLastTimestamp();
            if($request instanceof \Psr\Http\Message\ResponseInterface){//GuzzleHttp 6.3
                if($request->getStatusCode() === 200){
                    $response = json_decode((string)$request->getBody(), true);
                }else{
                    throw new \Exception($request->getStatusCode().': '.$request->getReasonPhrase(), $request->getStatusCode());
                }
            }else{//GuzzleHttp 5.1
                $response = $request->json();
            }

            if (!empty($response['error'])) {
                $this->logger->error(sprintf('Request %s error', $this->apiUrl), ['request' => $data, 'response' => $response]);
            } else {
                $this->logger->debug(sprintf('Request %s', $this->apiUrl), ['request' => $data, 'response' => $response]);
            }
        } catch (BadResponseException $exception) {
            $response = ['error' => [
                'message' => $exception->getResponse()->getStatusCode().': '.$exception->getResponse()->getReasonPhrase(),
                'code' => $exception->getResponse()->getStatusCode()]
            ];

            $this->logger->error(sprintf('Request %s error', $this->apiUrl), ['request' => $data, 'response' => $response]);
        }

        return $response;
    }
    public function setLastTimestamp(){
        Configuration::$last_query_ts = array_sum(explode(' ', microtime()));
    }
    public function waitMinimumMsInterval(){
        $msToWait = Configuration::getMaxRequestFrequency() * 1000;
        if($msToWait > 0){
            $currentMicroTime = array_sum(explode(' ', microtime()));
            $diffMs = round($currentMicroTime - Configuration::$last_query_ts, 3) * 1000;
            if($diffMs < $msToWait){
                usleep(($msToWait - $diffMs) * 1000);
            }
        }
    }
}