<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetCountries as PublicGetCountries,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient;

class GetCountries extends PublicGetCountries{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
}