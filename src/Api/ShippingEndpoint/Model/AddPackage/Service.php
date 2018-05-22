<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Service extends ArrayCollection{
    public function getShopArticle(){
        return $this->get("shopArticle");
    }
    public function getCount(){
        return $this->get("count");
    }
    public function getPrice(){
        return $this->get("price");
    }
    public function getVat(){
        return $this->get("vat");
    }
    public function getName(){
        return $this->get("name");
    }
}