<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Methods;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Method extends ArrayCollection{
    public function getId(){
        return $this->get("id");
    }
    public function getName(){
        return $this->get("name");
    }
    public function getCategory(){
        return $this->get("category");
    }
    public function getGroup(){
        return $this->get("group");
    }
    public function getCourier(){
        return $this->get("courier");
    }
    public function getComment(){
        return $this->get("comment");
    }
    public function getDescription(){
        return $this->get("description");
    }
}