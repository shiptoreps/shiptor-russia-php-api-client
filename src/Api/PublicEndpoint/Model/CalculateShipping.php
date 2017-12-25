<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Model\Method,
    ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as MethodsCollection;

class CalculateShipping extends Result{
    private $request;
    private $methods;
    protected function init(){
        $this->setRequest();
        $this->setMethodsList();
    }
    private function setRequest(){
        $this->request = new ArrayCollection($this->get('request'));
    }
    private function setMethodsList(){
        $this->methods = new MethodsCollection($this->get('methods'),Method::class);
    }
    public function getRequest(){
        return $this->request;
    }
    public function getMethodsList(){
        return $this->methods;
    }
}