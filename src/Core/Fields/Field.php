<?php
namespace ShiptorRussiaApiClient\Client\Core\Fields;

use ShiptorRussiaApiClient\Client\Core\Exception\EmptyValue,
    ShiptorRussiaApiClient\Client\Core\Exception\InvalidType,
    ShiptorRussiaApiClient\Client\Core\Collection\FieldsCollection;

abstract class Field{
    protected $type;
    protected $name;
    protected $required = false;
    protected $value;
    protected $collection;
    protected $multy = false;
    public function __construct($type,$name){
        $this->setType($type);
        $this->_setName($name);
    }
    protected function _set($name,$value){
        $this->$name = $value;
        return $this;
    }
    public function setType($type){
        return $this->_set("type", $type);
    }
    public function setRequired(){
        return $this->_set("required", true);
    }
    public function unsetRequired(){
        return $this->_set("required", false);
    }
    public function setMulty(){
        return $this->_set("multy", true);
    }
    public function _setName($name){
        return $this->_set("name", $name);
    }
    public function setCollection(FieldsCollection $collection){
        return $this->_set("collection", $collection);
    }
    public function add(){
        return $this->getCollection()->add($this->getName(),$this);
    }
    public function setValue($value){
        if($this->isMulty()){
            if(is_array($value)){
                $convertedValue = [];
                foreach($value as $val){
                    $convertedValue[] = $this->convertValue($val);
                }
            }else{
                $convertedValue = [$this->convertValue($value)];
            }
        }else{
            $convertedValue = $this->convertValue($value);
        }
        return $this->_set("value",$convertedValue);
    }
    public function unsetValue(){
        $this->value = null;
    }
    public function getType(){
        return $this->type;
    }
    public function getName(){
        return $this->name;
    }
    public function isRequired(){
        return $this->required;
    }
    public function getCollection(){
        return $this->collection;
    }
    public function getValue(){
        return $this->value;
    }
    public function isMulty(){
        return $this->multy;
    }
    protected function checkType(){
        if($this->isMulty()){
            return $this->checkMultiValue($this->getValue());
        }else{
            return $this->checkSingleValue($this->getValue());
        }
    }
    protected function checkMultiValue($values){
        $checkResult = [];
        foreach($values as $value){
            $checkResult[] = $this->checkSingleValue($value);
        }
        return array_product($checkResult);
    }
    abstract protected function checkSingleValue($value);
    abstract public function convertValue($value);
    public function isEmpty(){
        return empty($this->value);
    }
    public function validate(){
        if($this->isEmpty()){
            if($this->isRequired()){
                throw new EmptyValue([$this->getName(),$this->getCollection()->getEntity()->getMethodName()]);
            }
        }else{
            if(!$this->checkType()){
                throw new InvalidType([gettype($this->getValue()),$this->getName(),$this->getCollection()->getEntity()->getMethodName()]);
            }
        }
    }
}