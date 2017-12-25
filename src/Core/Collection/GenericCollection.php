<?php
namespace ShiptorRussiaApiClient\Client\Core\Collection;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class GenericCollection extends ArrayCollection{
    public function __construct($elements = array(),$className) {
        parent::__construct($elements);
        foreach($this->elements as $key => $element){
            $this->elements[$key] = new $className($element);
        }
    }
}