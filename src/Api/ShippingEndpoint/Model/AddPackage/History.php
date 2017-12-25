<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class History extends ArrayCollection{
    public function getDate(){
        return $this->get("date");
    }
    public function getEvent(){
        return $this->get("event");
    }
    public function getDescription(){
        return $this->get("description");
    }
}