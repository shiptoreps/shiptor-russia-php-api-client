<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Core\Model\Pvz as DeliveryPoint,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Methods\Method as ShippingMethod,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage\Departure\Address;

class Departure extends ArrayCollection{
    private $shippingMethod;
    private $address;
    private $deliveryPoint;
    public function __construct($elements = []) {
        parent::__construct($elements);
        $this->setShippingMethod();
        $this->setAddress();
        $this->setDeliveryPoint();
    }
    private function setShippingMethod(){
        $this->shippingMethod = new ShippingMethod($this->get("shipping_method"));
    }
    private function setAddress(){
        $this->address = new Address($this->get("address"));
    }
    private function setDeliveryPoint(){
        $this->deliveryPoint = new DeliveryPoint($this->get("delivery_point"));
    }
    public function hasDeliveryPoint(){
        return $this->hasValue("delivery_point");
    }
    public function getShippigmethod(){
        return $this->shippingMethod;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getDeliveryPoint(){
        return $this->deliveryPoint;
    }
    public function getCashlessPayment(){
        return $this->get('cashless_payment');
    }
    public function getComment(){
        return $this->get('comment');
    }
}