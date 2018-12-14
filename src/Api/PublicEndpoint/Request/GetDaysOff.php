<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\DaysOff as DaysOffResult;

class GetDaysOff extends GenericRequest{
    protected $name = "getDaysOff";
    protected function initFields(){
        $this->getFieldsCollection()
            ->String("from")->setRequired()->add()
            ->String("till")->setRequired()->add();
    }
    public function from($value){
        return $this->setField("from", $value);
    }
    public function till($value){
        return $this->setField("till", $value);
    }
    public function between($from,$till){
        if($this->checkReverseTime($from, $till)){
            $this->setField("from", $till);
            $this->setField("till", $from);
        }else{
            $this->setField("from", $from);
            $this->setField("till", $till);
        }
        return $this;
    }
    private function checkReverseTime($from, $till){
        if(strtotime($from) > strtotime($till)){
            return true;
        }
        return false;
    }
    public function getResponseClassName() {
        return DaysOffResult::class;
    }
}