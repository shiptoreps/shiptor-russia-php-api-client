<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Model\Settlement,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as SettlementsCollection;

class Settlements extends Result{
    private $list;
    protected function init(){
        $this->setList();
    }
    protected function setList(){
        $this->list = new SettlementsCollection($this->get('settlements'),Settlement::class);
    }
    public function getSettlementsList(){
        return $this->list;
    }
    public function getPage(){
        return $this->get('page');
    }
    public function getTotal(){
        return $this->get('count');
    }
    public function getPageSize(){
        return $this->get('per_page');
    }
    public function getPagesTotal(){
        return $this->get('pages');
    }
}