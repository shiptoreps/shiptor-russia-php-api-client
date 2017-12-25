<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class SettlementExtra extends ArrayCollection{
    private $country;
    public function __construct(array $elements = array()) {
        parent::__construct($elements);
        $this->setCountry();
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
    public function getShortReadable(){
        return $this->get("short_readable");
    }
    public function getAdministrativeArea(){
        return $this->get("administrative_area");
    }
    public function getReadableParents(){
        return $this->get("readable_parents");
    }
    public function setCountry(){
        $this->country = new ArrayCollection($this->get("country"));
    }
    public function getCountry(){
        return $this->country;
    }
    public function getCountryName(){
        return $this->getCountry()->get("name");
    }
    public function getCountryCode(){
        return $this->getCountry()->get("code");
    }
}