<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Stock,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as StocksCollection;

class Stocks extends Result{
    private $stocks;
    protected function init(){
        $this->setStocks();
    }
    private function setStocks(){
        $this->stocks = new StocksCollection($this->elements, Stock::class);
    }
    public function getStocks(){
        return $this->stocks;
    }
    public function hasStocks(){
        return boolval($this->count() > 0);
    }
}