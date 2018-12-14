<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Request,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Client as PublicClient;

abstract class GenericRequest extends Request\GenericRequest{
    protected function getClient(){
        return PublicClient::getInstance();
    }
}