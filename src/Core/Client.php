<?php
namespace ShiptorRussiaApiClient\Client\Core;

use GuzzleHttp\Client as GuzzleClient,
    GuzzleHttp\Exception\BadResponseException,
    ShiptorRussiaApiClient\Client\Core\Configuration;

abstract class Client{
    protected $apiUrl;
    protected $client;
    protected $headers = [];
    protected $last_ts = 0;
    protected static $instances = null;

    abstract protected function setApiUrl();
    protected function __construct(){
        $this->setApiUrl();
        $this->client = new GuzzleClient();
    }
    final public static function getInstance(){
        $calledClass = get_called_class();
        if (!isset(static::$instances[$calledClass])){
            static::$instances[$calledClass] = new $calledClass();
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
                    throw new \Exception($request->getStatusCode().': '.$request->getReasonPhrase());
                }
            }else{//GuzzleHttp 5.1
                $response = $request->json();
            }
        } catch (BadResponseException $exception) {
            $response = $exception->getResponse()->json();
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