<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Pickup as AddPickupResult;

class AddPickup extends GenericShippingRequest{
    protected $name = "addPickup";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("warehouse_id")->setRequired()->add()
                ->String("date")->setRequired()->add()
                ->Number("packages")->setMulty()->setRequired()->add()
                ->String("comment")->add();
    }
    public function setWarehouse($warehouseId){
        return $this->setField("warehouse_id", $warehouseId);
    }
    public function setDate($date){
        $convertedDate = date("Y-m-d",strtotime($date));
        return $this->setField("date", $convertedDate);
    }
    public function setPackages($arPackages){
        return $this->setField("packages", (array)$arPackages);
    }
    public function setComment($comment){
        return $this->setField("comment", $comment);
    }
    public function getResponseClassName() {
        return AddPickupResult::class;
    }
}