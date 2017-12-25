<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Product extends ArrayCollection{
    public function getName(){
        return $this->get("name");
    }
    public function getBarcode(){
        return $this->get("barcode");
    }
    public function getArticle(){
        return $this->get("article");
    }
    public function getShopArticle(){
        return $this->get("shopArticle");
    }
    public function getLength(){
        return $this->get("length");
    }
    public function getWidth(){
        return $this->get("width");
    }
    public function getHeight(){
        return $this->get("height");
    }
    public function getWeight(){
        return $this->get("weight");
    }
    public function getPrice(){
        return $this->get("price");
    }
    public function getRetailPrice(){
        return $this->get("retailPrice");
    }
    public function isFragile(){
        return $this->get("fragile");
    }
    public function isDanger(){
        return $this->get("danger");
    }
    public function isPerishable(){
        return $this->get("perishable");
    }
    public function isNeedBox(){
        return $this->get("needBox");
    }
}