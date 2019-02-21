<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Core\Model\Service,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as ServicesCollection;

class Method extends ArrayCollection{
    private $method;
    private $services;
    private $cost;
    private $total;
    public function __construct($elements){
        parent::__construct($elements);
        $this->setMethod();
        $this->setCost();
        $this->setServices();
        $this->setTotal();
    }
    public function setMethod(){
        $this->method = new ArrayCollection($this->get("method"));
    }
    public function getMethod(){
        return $this->method;
    }
    public function setCost(){
        $this->cost = new ArrayCollection($this->get("cost"));
    }
    public function getCost(){
        return $this->cost;
    }
    public function setServices(){
        $this->services = new ServicesCollection($this->getCost()->get("services"),Service::class);
    }
    public function getServices(){
        return $this->services;
    }
    public function setTotal(){
        $this->total = new ArrayCollection($this->getCost()->get("total"));
    }
    public function getId(){
        return $this->getMethod()->get("id");
    }
    public function getName(){
        return $this->getMethod()->get("name");
    }
    public function getCategory(){
        return $this->getMethod()->get("category");
    }
    public function getCourier(){
        return $this->getMethod()->get("courier");
    }
    public function getGroup(){
        return $this->getMethod()->get("group");
    }
    public function getDescription(){
        return $this->getMethod()->get("description");
    }
    public function getComment(){
        return $this->getMethod()->get("comment");
    }
    public function getTotal(){
        return $this->total;
    }
    public function getTotalSum(){
        return $this->getTotal()->get("sum");
    }
    public function getTotalCurrency(){
        return $this->getTotal()->get("currency");
    }
    public function getTotalReadable(){
        return $this->getTotal()->get("readable");
    }
    public function getDays(){
        return $this->get('days');
    }
    public function getPriority(){
        return $this->get('priority');
    }
}