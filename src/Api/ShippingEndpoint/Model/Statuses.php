<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Statuses\Status,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as StatusCollection;

class Statuses extends Result{
    private $statuses;
    protected function init(){
        $this->setStatuses();
    }
    protected function setStatuses(){
        $this->statuses = new StatusCollection($this->elements,Status::class);
    }
    public function getStatuses(){
        return $this->statuses;
    }
}