<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment\Product;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product as PackageProduct;

class Product extends PackageProduct{
    public function getBarcode(){
        return null;
    }
    public function getSku(){
        return $this->get("sku");
    }
}