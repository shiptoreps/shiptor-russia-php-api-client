<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result;

class Service extends Result{
    protected function init(){
        //
    }
    public function getId(){
        return $this->get("id");
    }
    public function getName(){
        return $this->get("name");
    }
    public function getShopArticle(){
        return $this->get("shopArticle");
    }
    public function getCost(){
        return $this->get("cost");
    }
}