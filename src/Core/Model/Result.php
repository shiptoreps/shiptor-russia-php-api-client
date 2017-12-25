<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

abstract class Result extends ArrayCollection{
    public function __construct(array $elements = []){
        parent::__construct($elements);
        if($this->isError()){
            throw new \Exception($this->getError());
        }else{
            $this->init();
        }
    }
    abstract protected function init();
    public function getError(){
        return $this->get('message');
    }
    public function isError(){
        if($this->containsKey('status')){
            if($this->get("status") == "error"){
                return true;
            }
        }
        return false;
    }
}