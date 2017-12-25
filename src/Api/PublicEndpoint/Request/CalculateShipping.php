<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Request\GenericRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\CalculateShipping as CalculateShippingResult;

class CalculateShipping extends GenericRequest{
    protected $name = "calculateShipping";
    protected function initFields(){
        $this->getFieldsCollection()
            ->Number("length")->setRequired()->add()
            ->Number("width")->setRequired()->add()
            ->Number("height")->setRequired()->add()
            ->Number("weight")->setRequired()->add()
            ->Number("cod")->setRequired()->add()
            ->Number("declared_cost")->setRequired()->add()
            ->Enum("country_code")->setOptions($this->getAvailableCountries())->add()
            ->String("kladr_id_from")->add()
            ->String("kladr_id")->setRequired()->add()
            ->Enum("courier")->setOptions($this->getAvailableCouriers())->add();
    }
    public function setDimensions($arDimensions){
        $this->setField("length",$arDimensions["LENGTH"]);
        $this->setField("width",$arDimensions["WIDTH"]);
        $this->setField("height",$arDimensions["HEIGHT"]);
        return $this;
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
    public function setCod($value){
        return $this->setField("cod",$value);
    }
    public function setDeclaredCost($value){
        return $this->setField("declared_cost",$value);
    }
    public function setKladrId($value){
        return $this->setField("kladr_id",$value);
    }
    public function inMoscow(){
        return $this->setField("kladr_id",self::KLADR_MOSCOW);
    }
    public function setKladrIdFrom($value){
        return $this->setField("kladr_id_from",$value);
    }
    public function setCountryCode($value){
        return $this->setField("country_code",$value);
    }
    public function forRu(){
        return $this->setCountryCode(self::COUNTRY_RU);
    }
    public function forKz(){
        return $this->setCountryCode(self::COUNTRY_KZ);
    }
    public function forBy(){
        return $this->setCountryCode(self::COUNTRY_BY);
    }
    private function setCourier($value){
        return $this->setField("courier",$value);
    }
    public function forShiptorCourier(){
        return $this->setCourier(self::COURIER_SHIPTOR);
    }
    public function forShiptor1Day(){
        return $this->setCourier(self::COURIER_SHIPTOR_1DAY);
    }
    public function forShiptorOversize(){
        return $this->setCourier(self::COURIER_SHIPTOR_OVERSIZE);
    }
    public function forBoxberry(){
        return $this->setCourier(self::COURIER_BOXBERRY);
    }
    public function forDpd(){
        return $this->setCourier(self::COURIER_DPD);
    }
    public function forIml(){
        return $this->setCourier(self::COURIER_IML);
    }
    public function forRussianPost(){
        return $this->setCourier(self::COURIER_RUSSIAN_POST);
    }
    public function forPickpoint(){
        return $this->setCourier(self::COURIER_PICKPOINT);
    }
    public function forCDEK(){
        return $this->setCourier(self::COURIER_CDEK);
    }
    public function forSPSR(){
        return $this->setCourier(self::COURIER_SPSR);
    }
    public function getResponseClassName() {
        return CalculateShippingResult::class;
    }
}