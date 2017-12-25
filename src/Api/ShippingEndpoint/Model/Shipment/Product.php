<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment\Product\Product as ShipmentProduct;

class Product extends ArrayCollection{
    private $product;
    public function __construct($elements){
         parent::__construct($elements);
         $this->setProduct();
    }
    public function setProduct(){
        $this->product = new ShipmentProduct($this->get("product"));
    }
    public function getCount(){
        return $this->get("awaitingCount");
    }
    public function getProduct(){
        return $this->product;
    }
    public function getName(){
        return $this->getProduct()->getName();
    }
    public function getSku(){
        return $this->getProduct()->getSku();
    }
    public function getArticle(){
        return $this->getProduct()->getArticle();
    }
    public function getShopArticle(){
        return $this->getProduct()->getShopArticle();
    }
    public function getLength(){
        return $this->getProduct()->getLength();
    }
    public function getWidth(){
        return $this->getProduct()->getWidth();
    }
    public function getHeight(){
        return $this->getProduct()->getHeight();
    }
    public function getWeight(){
        return $this->getProduct()->getWeight();
    }
    public function getPrice(){
        return $this->getProduct()->getPrice();
    }
    public function getRetailPrice(){
        return $this->getProduct()->getRetailPrice();
    }
    public function isFragile(){
        return $this->getProduct()->isFragile();
    }
    public function isDanger(){
        return $this->getProduct()->isDanger();
    }
    public function isPerishable(){
        return $this->getProduct()->isPerishable();
    }
    public function isNeedBox(){
        return $this->getProduct()->isNeedBox();
    }
}