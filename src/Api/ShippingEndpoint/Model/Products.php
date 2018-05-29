<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as ProductCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\ProductEx;

class Products extends Result{
    private $products;
    protected function init(){
        $this->setProducts();
    }
    private function setProducts(){
        $this->products = new ProductCollection($this->elements,ProductEx::class);
    }
    public function hasProducts(){
        return ($this->count() > 0);
    }
    public function getProducts(){
        return $this->products;
    }
    public function getSingleProduct(){
        if($this->count() == 1){
            foreach($this->getProducts() as $product){
                return $product->toArray();
            }
        }
    }
}