<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Statuses;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Status extends ArrayCollection{
    private $group;
    public function __construct($elements){
        parent::__construct($elements);
        $this->setGroup();
    }
    public function getCode(){
        return $this->get("code");
    }
    public function getName(){
        return $this->get("name");
    }
    public function getGroup(){
        return $this->group;
    }
    public function setGroup(){
        $this->group = new ArrayCollection($this->get('group'));
    }
}