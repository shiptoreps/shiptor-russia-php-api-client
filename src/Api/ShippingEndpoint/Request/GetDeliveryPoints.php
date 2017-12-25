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
                ->Boolean("self_pick_up")->add();
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
}