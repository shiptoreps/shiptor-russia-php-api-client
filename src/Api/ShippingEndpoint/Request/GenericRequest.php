<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient,
    ShiptorRussiaApiClient\Client\Core\Request\GenericRequest as PublicGenericRequest;

abstract class GenericRequest extends PublicGenericRequest{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
}