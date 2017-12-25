<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\Order;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Line extends ArrayCollection{
    public function getSum(){
        return $this->get("sum");
    }
    public function getService(){
        return $this->get("service");
    }
    public function getPackage(){
        return $this->get("package");
    }
    public function getPickup(){
        return $this->get("pickup");
    }
}