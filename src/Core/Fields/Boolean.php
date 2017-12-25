<?php
namespace ShiptorRussiaApiClient\Client\Core\Fields;

use ShiptorRussiaApiClient\Client\Core\Fields\Field;

class Boolean extends Field{
    public function __construct($name){
        parent::__construct("Boolean",$name);
    }
    public function convertValue($value){
        return boolval($value);
    }
    protected function checkSingleValue($value){
        return is_bool($value);
    }
}