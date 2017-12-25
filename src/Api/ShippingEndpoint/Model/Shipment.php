<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as ShipmentProductCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment\Product as ShipmentProduct;

class Shipment extends Result{
    private $products;
    protected function init(){
        $this->setProducts();
    }
    private function setProducts(){
        $this->products = new ShipmentProductCollection($this->get("products"),ShipmentProduct::class);
    }
    public function getAwaitingCount(){
        return $this->get("awaitingCount");
    }
    public function getAwaitingProductCount(){
        return $this->get("awaitingProductCount");
    }
    public function getStock(){
        return $this->get("stock");
    }
    public function getProducts(){
        return $this->products;
    }
}