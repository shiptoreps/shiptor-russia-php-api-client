<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as PackagesCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package;

class Packages extends Result{
    private $packages;
    protected function init(){
        $this->setPackages();
    }
    private function setPackages(){
        $this->packages = new PackagesCollection($this->elements,Package::class);
    }
    public function hasPackages(){
        return ($this->count() > 0);
    }
    public function getPackages(){
        return $this->packages;
    }
}