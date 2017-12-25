<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Model\Pvz,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as PvzCollection;

class DeliveryPoints extends Result{
    private $list;
    protected function init(){
        $this->setList();
    }
    private function setList(){
        $this->list = new PvzCollection($this->toArray(),Pvz::class);
    }
    public function getDeliveryPoints(){
        return $this->list;
    }
}