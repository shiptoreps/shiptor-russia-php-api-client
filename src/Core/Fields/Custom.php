<?php
namespace ShiptorRussiaApiClient\Client\Core\Fields;

use ShiptorRussiaApiClient\Client\Core\Fields\Field,
    ShiptorRussiaApiClient\Client\Core\Collection\FieldsCollection;

abstract class Custom extends Field{
    protected $fields;
    protected $index = -1;
    public function __construct($name) {
        parent::__construct("custom",$name);
    }
    protected function setFieldsCollection(){
        if($this->isMulty()){
            $this->fields[$this->index] = new FieldsCollection($this);
        }else{
            $this->fields = new FieldsCollection($this);
        }
        $this->setFields();
    }

    /**
     * @return FieldsCollection
     */
    protected function getFieldsCollection(){
        return ($this->isMulty()?$this->fields[$this->index]:$this->fields);
    }

    abstract protected function setFields();
    public function _new(){
        if($this->isMulty()){
            $this->index++;
        }
        $this->setFieldsCollection();
        return $this;
    }
    public function isEmpty(){
        $this->value = $this->getValue();
        return empty($this->value);
    }
    public function validate(){
        if(!empty($this->fields)){
            foreach($this->fields as $item){
                $item->validate();
            }
        }
        return true;
    }
    public function getValue(){
        $arData = [];
        if(!empty($this->fields)){
            if($this->isMulty()){
                foreach($this->fields as $index => $item){
                    $arData[$index] = $item->toArray();
                }
            }else{
                $arData = $this->fields->toArray();
            }
        }
        return $arData;
    }
    public function getMethodName(){
        return $this->getCollection()->getEntity()->getMethodName();
    }
}