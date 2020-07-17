<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint;

use ShiptorRussiaApiClient\Client\Core;

class Client extends Core\Client{
    protected function setApiUrl() {
        $this->apiUrl = Core\Configuration::getShippingUrl();
    }
    protected function setHeaders(){
        parent::setHeaders();
        $apiKey = Core\Configuration::getApiKey();
        if (empty($apiKey)) {
            throw new Core\Exception\EmptyApiKey();
        }
        if(strlen($apiKey) < 40){
            throw new Core\Exception\WrongApiKey();
        }
        $this->headers['X-Authorization-Token'] = $apiKey;
    }
}