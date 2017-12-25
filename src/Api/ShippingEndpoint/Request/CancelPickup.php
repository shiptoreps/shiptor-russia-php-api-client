<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Pickup as CancelPickupResult;

class CancelPickup extends GenericShippingRequest{
    protected $name = "cancelPickUp";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("id")->setRequired()->add();
    }
    public function setId($id){
        return $this->setField("id", $id);
    }
    public function getResponseClassName() {
        return CancelPickupResult::class;
    }
}