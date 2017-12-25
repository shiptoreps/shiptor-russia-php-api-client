<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint;

use ShiptorRussiaApiClient\Client\Core\Exception\EmptyApiKey,
    ShiptorRussiaApiClient\Client\Core\Exception\WrongApiKey,
    \ShiptorRussiaApiClient\Client\Core\Client as PublicClient,
    ShiptorRussiaApiClient\Client\Core\Configuration;

class Client extends PublicClient{
    protected $apiKey = '';
    protected function __construct($apiKey = null) {
        parent::__construct(Configuration::SHIPPING_URL);
        if($apiKey !== null){
            $this->apiKey = $apiKey;
        }else{
            $this->apiKey = Configuration::$apiKey;
        }
        if (empty($this->apiKey)) {
            throw new EmptyApiKey();
        }
        if(strlen($this->apiKey) < 40){
            throw new WrongApiKey();
        }
    }
    protected function setHeaders(){
        $this->headers = array(
            'x-authorization-token' => $this->apiKey,
            'content-type' => 'application/json'
        );
    }
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new self(Configuration::getApiKey());
        }
        return self::$instance;
    }
}