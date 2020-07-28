<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class PostamatCell extends ArrayCollection{
    public function getStatus(){
        return $this->get("status");
    }
    public function getMessage(){
        return $this->get("message");
    }
}