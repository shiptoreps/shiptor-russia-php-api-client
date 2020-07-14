<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as PackageStatusesCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\Status as PackageStatus;

class PackageStatuses extends Result{
    private $packageStatuses;
    protected function init(){
        $this->setPackageStatuses();
    }
    private function setPackageStatuses(){
        $this->packageStatuses = new PackageStatusesCollection($this->elements, PackageStatus::class);
    }
    public function hasPackageStatuses(){
        return ($this->count() > 0);
    }
    public function getPackageStatuses(){
        return $this->packageStatuses;
    }
}