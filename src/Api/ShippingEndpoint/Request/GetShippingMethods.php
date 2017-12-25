<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Methods as GetShippingMethodsResult;

class GetShippingMethods extends GenericShippingRequest{
    protected function initFields(){
        //
    }
    public function getResponseClassName() {
        return GetShippingMethodsResult::class;
    }
}