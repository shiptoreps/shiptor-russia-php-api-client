<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Packages as GetPackagesResult;

class GetPackages extends GenericShippingRequest{
    protected $name = "getPackages";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("stock")->add()
                ->Number("page")->setRequired()->add()
                ->Number("per_page")->setRequired()->add()
                ->Boolean("delivered")->add()
                ->Boolean("returned")->add()
                ->Boolean("archived")->add();
    }
    public function setStock($stockId){
        return $this->setField("stock",$stockId);
    }
    public function setPage($page){
        return $this->setField("page",$page);
    }
    public function setPageSize($size){
        return $this->setField("per_page",$size);
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
    public function setArchived($is){
        return $this->setField("archived",$is);
    }
    public function archived(){
        return $this->setArchived(true);
    }
    public function notArchived(){
        return $this->setArchived(false);
    }
    public function getResponseClassName() {
        return GetPackagesResult::class;
    }
}