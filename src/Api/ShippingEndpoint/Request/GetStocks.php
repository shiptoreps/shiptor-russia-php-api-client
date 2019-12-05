<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Stocks as GetStocksResult;

class GetStocks extends GenericShippingRequest{
    protected $name = "getStocks";
    protected function initFields(){
        //
    }
    public function getResponseClassName(){
        return GetStocksResult::class;
    }
}