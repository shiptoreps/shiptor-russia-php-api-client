<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment as DeleteShipmentResult;

class DeleteShipment extends GenericShippingRequest{
    protected $name = "removeShipment";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("id")->setRequired()->add();
    }
    public function setId($id){
        return $this->setField("id",$id);
    }
    public function getResponseClassName() {
        return DeleteShipmentResult::class;
    }
}