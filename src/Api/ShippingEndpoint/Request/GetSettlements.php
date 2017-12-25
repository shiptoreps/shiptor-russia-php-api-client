<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetSettlements as PublicGetSettlements,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient;

class GetSettlements extends PublicGetSettlements{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
}