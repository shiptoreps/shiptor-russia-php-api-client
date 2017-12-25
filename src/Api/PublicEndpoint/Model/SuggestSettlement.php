<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Model\SettlementExtra,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as SettlementsCollection;

class SuggestSettlement extends Result{
    private $list;
    protected function init(){
        $this->setList();
    }
    private function setList(){
        $this->list = new SettlementsCollection($this->elements,SettlementExtra::class);
    }
    public function getSettlementsList(){
        return $this->list;
    }
}