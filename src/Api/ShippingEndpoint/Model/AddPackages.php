<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as PackagesCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackages as Package,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\Shipment as PackagesShipment;
class AddPackages extends Result{
    private $shipment;
    private $packages;
    protected function init(){
        $this->setShipment();
        $this->setPackages();
    }
    private function setShipment(){
        $this->shipment = new PackagesShipment($this->get("shipment"));
    }
    public function getShipment(){
        return $this->shipment;
    }
    private function setPackages(){
        $this->packages = new PackagesCollection($this->elements,Package::class);
    }
    public function hasPackages(){
        return ($this->getPackages()->count() > 0);
    }
    public function getPackages(){
        return $this->packages;
    }
}