<?php
namespace ShiptorRussiaApiClient\Client\Core;

use GuzzleHttp\Client as GuzzleClient,
    GuzzleHttp\Exception\BadResponseException,
    ShiptorRussiaApiClient\Client\Core\Configuration;

class Client{
    protected $apiUrl;
    protected $client;
    protected $headers = [];

    protected function __construct($apiUrl)
    {
        if(empty($apiUrl)){
            $this->apiUrl = Configuration::PUBLIC_URL;
        }else{
            $this->apiUrl = $apiUrl;
        }
        $this->client = new GuzzleClient();
    }
    public static function getInstance(){
        return new self(Configuration::PUBLIC_URL);
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
            $request = $this->client->post($this->apiUrl, [
                'headers' => $this->headers,
                'body' => json_encode($data),
            ]);
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
}