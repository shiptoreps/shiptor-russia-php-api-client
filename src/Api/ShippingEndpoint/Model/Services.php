<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Service,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as ServicesCollection;

class Services extends Result{
    private $services;
    protected function init(){
        $this->setServices();
    }
    private function setServices(){
        $this->services = new ServicesCollection($this->get("services"),Service::class);
    }
    public function getServices(){
        return $this->services;
    }
    public function hasServices(){
        return $this->hasValue("services");
    }
    public function getCount(){
        return $this->get("count");
    }
    public function getPage(){
        return $this->get("page");
    }
    public function getPageSize(){
        return $this->get("per_page");
    }
    public function getPagesCount(){
        return $this->get("pages");
    }
}