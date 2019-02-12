<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Statuses as GetStatusListResult;

class GetStatusList extends GenericShippingRequest{
    protected $name = "getStatusList";
    public function initFields() {
        //
    }
    public function getResponseClassName(){
        return GetStatusListResult::class;
    }
}