<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Service extends ArrayCollection{
    public function getCode(){
        return $this->get("service");
    }
    public function getSum(){
        return $this->get("sum");
    }
    public function getCurrency(){
        return $this->get("currency");
    }
    public function getReadable(){
        return $this->get("readable");
    }
}