<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result;

class Provider extends Result{
    protected function init(){
        //
    }
    public function getId(){
        return $this->get("id");
    }
    public function getName(){
        return $this->get("name");
    }
    public function getAddress(){
        return $this->get("address");
    }
    public function getPhone(){
        return $this->get("phone");
    }
    public function getComment(){
        return $this->get("comment");
    }
}