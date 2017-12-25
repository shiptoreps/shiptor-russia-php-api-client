<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as OrderLineCollection,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\Order\Line as OrderLine;

class Order extends ArrayCollection{
    private $lines;
    public function __construct($elements){
        parent::__construct($elements);
        if(!empty($this->elements)){
            $this->setLines();
        }
    }
    private function setLines(){
        $this->lines = new OrderLineCollection($this->get("lines"),OrderLine::class);
    }
    public function getTransactionId(){
        return $this->get("transaction");
    }
    public function getLines(){
        return $this->lines;
    }
}