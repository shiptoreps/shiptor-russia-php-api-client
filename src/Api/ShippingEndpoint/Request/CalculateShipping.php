<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\CalculateShipping as PublicCalculateShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient;

class CalculateShipping extends PublicCalculateShippingRequest{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
}