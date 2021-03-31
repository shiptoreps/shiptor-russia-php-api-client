<?php
namespace ShiptorRussiaApiClient\Client\Core\Collection;

use ShiptorRussiaApiClient\Client\Core\Exception\WrongObjectType,
    ShiptorRussiaApiClient\Client\Core\Exception\UnknownField,
    ShiptorRussiaApiClient\Client\Core\Fields\Number,
    ShiptorRussiaApiClient\Client\Core\Fields\StringField,
    ShiptorRussiaApiClient\Client\Core\Fields\Boolean,
    ShiptorRussiaApiClient\Client\Core\Fields\Enum,
    ShiptorRussiaApiClient\Client\Core\Fields\Field;

class FieldsCollection{
    private $fields;
    private $entity = null;
    private $parent = null;
    private $subCollectionName = null;
    function __construct($entity, $parent = null) {
        $this->setEntity($entity);
        if($parent !== null){
            $this->setParent($parent);
        }
    }
    public function add($name,$field){
        $this->fields[$name] = $field;
        return $this;
    }
    public function remove($name){
        unset($this->fields[$name]);
        return $this;
    }
    public function Number($name){
        return $this->createField("Number",$name);
    }
    public function String($name){
        return $this->createField("String",$name);
    }
    public function Boolean($name){
        return $this->createField("Boolean",$name);
    }
    public function Enum($name){
        return $this->createField("Enum",$name);
    }

    /**
     * @param string $name
     * @param string $className
     * @return Field
     */
    public function Custom($name, $className){
        return (new $className($name))->setCollection($this);
    }

    public function Collection($name){
        $this->setSubcollectionName($name);
        return new FieldsCollection($this->getEntity(),$this);
    }
    public function setSubcollectionName($name){
        $this->subCollectionName = $name;
    }
    public function getSubcollectionName(){
        return $this->subCollectionName;
    }
    public function endCollection(){
        return $this->getParent()->add($this->getParent()->getSubcollectionName(),$this);
    }

    /**
     * @param string $key
     * @return Field|FieldsCollection
     */
    public function get($key){
        if(!$this->contains($key)){
            throw new UnknownField([$key,$this->getEntity()->getMethodName()]);
        }
        return $this->fields[$key];
    }
    public function contains($key){
        return isset($this->elements[$key]) || array_key_exists($key, $this->fields);
    }
    private function createField($fieldType,$fieldName){
        switch($fieldType){
            case "Number":
                $oField = new Number($fieldName);
                break;
            case "String":
                $oField = new StringField($fieldName);
                break;
            case "Boolean":
                $oField = new Boolean($fieldName);
                break;
            case "Enum":
                $oField = new Enum($fieldName);
                break;
            default:
                throw new UnknownFieldType([$fieldType,$this->getEntity()]);
        }
        return $oField->setCollection($this);
    }
    private function setEntity($entity){
        $this->entity = $entity;
    }
    public function getEntity(){
        return $this->entity;
    }
    public function setParent(FieldsCollection $parent){
        if($parent !== null){
            $this->parent = $parent;
        }
    }
    public function getParent(){
        return $this->parent;
    }
    public function validate(){
        if(!empty($this->fields)){
            foreach($this->fields as $item){
                $item->validate();
            }
        }
        return true;
    }
    public function toArray(){
        $data = [];
        if(!empty($this->fields)){
            foreach($this->fields as $name => $item){
                if($item instanceof FieldsCollection){
                    $subData = $item->toArray();
                    if(!empty($subData)){
                        $data[$name] = $subData;
                    }
                }elseif($item instanceof Field){
                    if(!$item->isEmpty()){
                        $data[$name] = $item->getValue();
                    }
                }else{
                    throw new WrongObjectType([get_class($item), __CLASS__."::".__FUNCTION, $name]);
                }
            }
        }
        return $data;
    }
}