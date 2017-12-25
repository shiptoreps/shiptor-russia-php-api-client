<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Photo extends ArrayCollection{
    public function getDefault(){
        return $this->get("default");
    }
    public function getMedium(){
        return $this->get("medium");
    }
    public function getMini(){
        return $this->get("mini");
    }
}