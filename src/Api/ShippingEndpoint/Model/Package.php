<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection,
    ShiptorRussiaApiClient\Client\Core\Model\Checkpoint as PackageCheckpoint,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\Shipment as PackageShipment,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\Order as PackageOrder,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage as SimplePackage;

class Package extends SimplePackage{
    private $cost;
    private $shipment;
    private $checkpoints;
    private $orders;
    protected function init(){
        parent::init();
        $this->setCost();
        $this->setShipment();
        $this->setCheckpoints();
        $this->setOrders();
    }
    private function setCost(){
        $this->cost = new ArrayCollection($this->get("cost"));
    }
    private function setShipment(){
        $this->shipment = new PackageShipment($this->get("shipment"));
    }
    private function setCheckpoints(){
        $this->checkpoints = new GenericCollection($this->get("checkpoints"),PackageCheckpoint::class);
    }
    private function setOrders(){
        $this->orders = new GenericCollection($this->get("orders"),PackageOrder::class);
    }
    public function getCost(){
        return $this->cost;
    }
    public function getShipment(){
        return $this->shipment;
    }
    public function getCheckpoint(){
        return $this->checkpoints;
    }
    public function getOrders(){
        return $this->orders;
    }
    public function getShippingCost(){
        return $this->getCost()->get("shipping_cost");
    }
    public function getCodServiceCost(){
        return $this->getCost()->get("cod_service_cost");
    }
    public function getCompensationServiceCost(){
        return $this->getCost()->get("compensation_service_cost");
    }
    public function getTotalCost(){
        return $this->getCost()->get("total_cost");
    }
}