<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result;

class PackagesCount extends Result{
    protected function init(){
        //
    }
    public function getCount(){
        return $this->get("count");
    }
}