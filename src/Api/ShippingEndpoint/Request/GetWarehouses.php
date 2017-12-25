<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Warehouses as GetWarehousesResult;

class GetWarehouses extends GenericShippingRequest{
    protected $name = "getWarehouses";
    protected function initFields(){
        //
    }
    public function getResponseClassName(){
        return GetWarehousesResult::class;
    }
}