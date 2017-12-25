<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Checkpoint extends ArrayCollection{
    public function getDate(){
        return $this->get("date");
    }
    public function getMessage(){
        return $this->get("message");
    }
    public function getCurrency(){
        return $this->get("currency");
    }
    public function getDetails(){
        return $this->get("details");
    }
}