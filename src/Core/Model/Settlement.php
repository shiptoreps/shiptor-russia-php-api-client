<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as SettlementParentsCollection;

class Settlement extends ArrayCollection{
    protected $parents = [];
    public function __construct($elements = array()) {
        parent::__construct($elements);
        if($this->hasParents()){
            $this->parents = new SettlementParentsCollection($this->get("parents"),Settlement::class);
        }
    }
    public function hasParents(){
        return boolval(!empty($this->elements['parents']) && is_array($this->elements['parents']));
    }
    public function getKladrId(){
        return $this->get("kladr_id");
    }
    public function getName(){
        return $this->get("name");
    }
    public function getType(){
        return $this->get("type");
    }
    public function getTypeShort(){
        return $this->get("type_short");
    }
    public function getParents(){
        return $this->parents;
    }
}