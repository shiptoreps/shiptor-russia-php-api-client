<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Warehouse;

class Pickup extends Result{
    private $warehouse;
    protected function init(){
        $this->setWarehouse();
    }
    private function setWarehouse(){
        $this->warehouse = new Warehouse($this->get("warehouse"));
    }
    public function getWarehouse(){
        return $this->warehouse;
    }
    public function getId(){
        return $this->get("id");
    }
    public function getStatus(){
        return $this->get("status");
    }
    public function getPackages(){
        return $this->get("packages");
    }
    public function getDate(){
        return $this->get("date");
    }
    public function getComment(){
        return $this->get("comment");
    }
}