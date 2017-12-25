<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\DeliveryTime as GetDeliveryTimeResult;

class GetDeliveryTime extends GenericShippingRequest{
    protected $name = "getDeliveryTime";
    protected function initFields(){
        //
    }
    public function getResponseClassName(){
        return GetDeliveryTimeResult::class;
    }
}