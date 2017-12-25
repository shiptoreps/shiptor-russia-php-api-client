<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\SuggestSettlement as PublicSuggestSettlement,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient;

class SuggestSettlement extends PublicSuggestSettlement{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
}