<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Country extends ArrayCollection{
    public function getCode(){
        return $this->get("code");
    }
    public function getName(){
        return $this->get("name");
    }
}