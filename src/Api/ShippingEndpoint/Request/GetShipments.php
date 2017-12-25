<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipments as GetShipmentResult;

class GetShipments extends GenericShippingRequest{
    protected $name = "getShipments";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("stock")->add()
                ->Number("page")->setRequired()->add()
                ->Number("per_page")->setRequired()->add();
    }
    public function setStock($stockId){
        return $this->setField("stock",$stockId);
    }
    public function setPage($page){
        return $this->setField("page",$page);
    }
    public function setPageSize($pageSize){
        return $this->setField("per_page",$pageSize);
    }
    public function getResponseClassName(){
        return GetShipmentResult::class;
    }
}