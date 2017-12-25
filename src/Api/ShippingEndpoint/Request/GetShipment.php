<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipments\Shipment as GetShipmentResult;

class GetShipment extends GenericShippingRequest{
    protected $name = "getShipment";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("id")->setRequired()->add();
    }
    public function setId($id){
        return $this->setField("id",$id);
    }
    public function getResponseClassName(){
        return GetShipmentResult::class;
    }
}