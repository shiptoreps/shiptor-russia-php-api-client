<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Methods\Method,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as MethodsCollection;

class Methods extends Result{
    private $methods;
    protected function init(){
        $this->setMethods();
    }
    protected function setMethods(){
        $this->methods = new MethodsCollection($this->elements,Method::class);
    }
    public function getMethods(){
        return $this->methods;
    }
}