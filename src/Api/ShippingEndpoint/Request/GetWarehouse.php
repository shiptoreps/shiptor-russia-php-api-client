<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Warehouse as GetWarehouseResult;

class GetWarehouse extends GenericShippingRequest{
    protected $name = "getWarehouse";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("id")->setRequired()->add();
    }
    public function setId($id){
        return $this->setField("id",$id);
    }
    public function getResponseClassName(){
        return GetWarehouseResult::class;
    }
}