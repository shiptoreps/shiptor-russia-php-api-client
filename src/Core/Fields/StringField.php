<?php
namespace ShiptorRussiaApiClient\Client\Core\Fields;

use ShiptorRussiaApiClient\Client\Core\Fields\Field;

class StringField extends Field{
    public function __construct($name){
        parent::__construct("String",$name);
    }
    public function convertValue($value){
        return (string)$value;
    }
    protected function checkSingleValue($value){
        return is_string($value);
    }
}