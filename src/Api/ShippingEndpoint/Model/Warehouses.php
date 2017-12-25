<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Warehouse,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as WarehousesCollection;

class Warehouses extends Result{
    private $warehouses;
    protected function init(){
        $this->setWarehouses();
    }
    private function setWarehouses(){
        $this->warehouses = new WarehousesCollection($this->elements,Warehouse::class);
    }
    public function getWarehouses(){
        return $this->warehouses;
    }
    public function hasWarehouses(){
        return boolval($this->count() > 0);
    }
}