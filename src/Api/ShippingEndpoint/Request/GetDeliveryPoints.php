<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetDeliveryPoints as PublicGetDeliveryPoints,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient;

class GetDeliveryPoints extends PublicGetDeliveryPoints{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
    protected function initFields() {
        parent::initFields();
        $this->getFieldsCollection()
                ->Boolean("self_pick_up")->add()
                ->Boolean("self_pick_up_real_time")->add()
                ->Number("from_delivery_point")->add()
                ->String("polygon")->setMulty()->add();
    }
    public function setSelfPickup($value){
        return $this->setField("self_pick_up", $value);
    }
    public function withSelfPickup(){
        return $this->setSelfPickup(true);
    }
    public function withoutSelfPickup(){
        return $this->setSelfPickup(false);
    }
    public function setSelfPickupRealTime($value){
        return $this->setField("self_pick_up_real_time", $value);
    }
    public function setFromDeliveryPoint($value){
        return $this->setField("from_delivery_point", $value);
    }
}