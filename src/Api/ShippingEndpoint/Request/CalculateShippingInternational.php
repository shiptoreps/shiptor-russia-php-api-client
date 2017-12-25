<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\CalculateShipping as CalculateShippingInternationalResult;

class CalculateShippingInternational extends GenericShippingRequest{
    protected $name = "calculateShippingInternational";
    protected function initFields() {
        $this->getFieldsCollection()
                ->Number("length")->setRequired()->add()
                ->Number("width")->setRequired()->add()
                ->Number("height")->setRequired()->add()
                ->Number("weight")->setRequired()->add()
                ->String("departure_country_code")->add()
                ->String("destination_country_code")->add();
    }
    public function setLength($value){
        return $this->setField("length",$value);
    }
    public function setWidth($value){
        return $this->setField("width",$value);
    }
    public function setHeight($value){
        return $this->setField("height",$value);
    }
    public function setWeight($value){
        return $this->setField("weight",$value);
    }
    public function setCountryFrom($value){
        return $this->setField("departure_country_code",$value);
    }
    public function fromRu(){
        return $this->setCountryFrom(self::COUNTRY_RU);
    }
    public function fromKz(){
        return $this->setCountryFrom(self::COUNTRY_KZ);
    }
    public function fromBy(){
        return $this->setCountryFrom(self::COUNTRY_BY);
    }
    public function setCountryTo($value){
        return $this->setField("destination_country_code",$value);
    }
    public function toRu(){
        return $this->setCountryTo(self::COUNTRY_RU);
    }
    public function toKz(){
        return $this->setCountryTo(self::COUNTRY_KZ);
    }
    public function toBy(){
        return $this->setCountryTo(self::COUNTRY_BY);
    }
    public function getResponseClassName() {
        return CalculateShippingInternationalResult::class;
    }
}