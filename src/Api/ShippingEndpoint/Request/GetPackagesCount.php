<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\PackagesCount as GetPackagesCountResult;

class GetPackagesCount extends GenericShippingRequest{
    protected $name = "getPackagesCount";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Boolean("delivered")->add()
                ->Boolean("returned")->add();
    }
    public function setDelivered($is){
        return $this->setField("delivered",$is);
    }
    public function delivered(){
        return $this->setDelivered(true);
    }
    public function notDelivered(){
        return $this->setDelivered(false);
    }
    public function setReturned($is){
        return $this->setField("returned",$is);
    }
    public function returned(){
        return $this->setReturned(true);
    }
    public function notReturned(){
        return $this->setReturned(false);
    }
    public function getResponseClassName() {
        return GetPackagesCountResult::class;
    }
}