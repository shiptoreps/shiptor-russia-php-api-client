<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Status extends ArrayCollection{
    public function __construct($elements){
        parent::__construct($elements);
    }
    public function getStatus(){
        return $this->get("status");
    }
    public function isPaid(){
        return $this->get("paid");
    }
}