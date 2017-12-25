<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result;

class DaysOff extends Result{
    protected function init(){
        //
    }
    public function getDaysOff(){
        return $this->elements;
    }
}