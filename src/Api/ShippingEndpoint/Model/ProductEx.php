<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product;

class ProductEx extends Product{
    public function getSku(){
        return $this->get("sku");
    }
    public function getBarcode(){
        return false;
    }
    public function getFulfillment(){
        return $this->get("fulfilment");
    }
    public function getTotal(){
        return $this->getFulfillment()->get("total");
    }
    public function getWaiting(){
        return $this->getFulfillment()->get("waiting");
    }
}