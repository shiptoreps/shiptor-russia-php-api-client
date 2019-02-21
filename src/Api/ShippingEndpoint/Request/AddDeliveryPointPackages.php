<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackages\Package,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackages as AddPackagesResult;

class AddDeliveryPointPackages extends GenericShippingRequest{
    protected $name = "addPackages";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Collection("shipment")
                    ->String("type")->setRequired()->add()
                    ->Enum("courier")->setRequired()->setOptions($this->getAbailablePvzCouriers())->add()
                    ->Collection("address")
                        ->String("receiver")->setRequired()->add()
                        ->String("email")->add()
                        ->String("phone")->setRequired()->add()
                    ->endCollection()
                    ->Number("delivery_point")->setRequired()->add()
                    ->String("date")->setRequired()->add()
                    ->String("comment")->setRequired()->add()
                ->endCollection()
                ->Custom("packages", Package::class)->setMulty()->add();
        $this->setType("delivery-point");
    }
    public function getShipment(){
        return $this->getFieldsCollection()->get("shipment");
    }
    private function setType($type){
        return $this->getShipment()->get("type")->setValue($type);
    }
    public function setCourier($courier){
        return $this->getShipment()->get("courier")->setValue($courier);
    }
    public function forBoxBerry(){
        return $this->setCourier(self::COURIER_BOXBERRY);
    }
    public function forCdek(){
        return $this->setCourier(self::COURIER_CDEK);
    }
    public function forDpd(){
        return $this->setCourier(self::COURIER_DPD);
    }
    public function forIml(){
        return $this->setCourier(self::COURIER_IML);
    }
    public function forPickpoint(){
        return $this->setCourier(self::COURIER_PICKPOINT);
    }
    public function forShiptor(){
        return $this->setCourier(self::COURIER_SHIPTOR);
    }
    public function forSprs(){
        return $this->setCourier(self::COURIER_SPSR);
    }
    public function getAddress(){
        return $this->getShipment()->get('address');
    }
    public function setReciever($reciever){
        return $this->getAddress()->get("receiver")->setValue($reciever);
    }
    public function setEmail($email){
        return $this->getAddress()->get("email")->setValue($email);
    }
    public function setPhone($phone){
        return $this->getAddress()->get("phone")->setValue($phone);
    }
    public function setDate($date){
        $this->getShipment()->get("date")->setValue($date);
        return $this;
    }
    public function setDeliveryPoint($deliveryPoint){
        $this->getShipment()->get('delivery_point')->setValue($deliveryPoint);
        return $this;
    }
    public function setComment($comment){
        $this->getShipment()->get("comment")->setValue($comment);
        return $this;
    }
    public function newPackage(){
        return $this->getFieldsCollection()->get("packages")->_new();
    }
    public function getResponseClassName() {
        return AddPackagesResult::class;
    }
}