<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as ShipmentProductCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipments\Shipment;

class Shipments extends Result{
    private $shipments;
    protected function init(){
        $this->setShipments();
    }
    private function setShipments(){
        $this->shipments = new ShipmentProductCollection($this->get("shipments"),Shipment::class);
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
    public function getShipments(){
        return $this->shipments;
    }
}