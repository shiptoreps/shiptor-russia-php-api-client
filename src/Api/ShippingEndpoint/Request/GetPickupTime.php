<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\DeliveryTime as GetPickupTimeResult;

class GetPickupTime extends GenericShippingRequest{
    protected $name = "getPickUpTime";
    protected function initFields(){
        //
    }
    public function getResponseClassName() {
        return GetPickupTimeResult::class;
    }
}