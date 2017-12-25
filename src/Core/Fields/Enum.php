<?php
namespace ShiptorRussiaApiClient\Client\Core\Fields;

use ShiptorRussiaApiClient\Client\Core\Exception\InvalidEnumValue,
    ShiptorRussiaApiClient\Client\Core\Fields\Field;

class Enum extends Field{
    protected $options = [];
    public function __construct($name){
        parent::__construct("Enum",$name);
    }
    public function getOptions(){
        return $this->options;
    }
    public function checkOptions(){
        if($this->isMulty()){
            $checkResult = [];
            foreach($this->getValue() as $value){
                $checkResult[] = in_array($value,$this->getOptions());
            }
            return array_product($checkResult);
        }else{
            return in_array($this->getValue(),$this->getOptions());
        }
    }
    public function setOptions($arValues){
        return $this->_set("options",$arValues);
    }
    public function convertValue($value){
        return (string)$value;
    }
    protected function checkSingleValue($value){
        return is_string($value);
    }
    public function validate(){
        parent::validate();
        if(!$this->checkOptions() && !$this->isEmpty()){
            throw new InvalidEnumValue([gettype($this->getValue()),$this->getName(),$this->getCollection()->getEntity()->getMethodName()]);
        }
    }
}