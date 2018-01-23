<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Request\GenericRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\DeliveryPoints as DeliveryPointsResult;

class GetDeliveryPoints extends GenericRequest{
    protected $name = "getDeliveryPoints";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("kladr_id")->setRequired()->add()
                ->Enum("courier")->setOptions($this->getAbailablePvzCouriers())->add()
                ->Number("shipping_method")->setRequired()->add()
                ->Boolean("cod")->add()
                ->Boolean("card")->add()
                ->Collection("limits")
                    ->Number("length")->add()
                    ->Number("width")->add()
                    ->Number("height")->add()
                    ->Number("weight")->add()
                ->endCollection();
    }
    public function setLimits($arLimits){
        $this->getLimits()->get("length")->setValue($arLimits["LENGTH"]);
        $this->getLimits()->get("width")->setValue($arLimits["WIDTH"]);
        $this->getLimits()->get("height")->setValue($arLimits["HEIGHT"]);
        $this->getLimits()->get("weight")->setValue($arLimits["WEIGHT"]);
        return $this;
    }
    private function getLimits(){
        return $this->getFieldsCollection()->get("limits");
    }
    public function setLength($value){
        $this->getLimits()->get("length")->setValue($value);
        return $this;
    }
    public function setWidth($value){
        $this->getLimits()->get("width")->setValue($value);
        return $this;
    }
    public function setHeight($value){
        $this->getLimits()->get("height")->setValue($value);
        return $this;
    }
    public function setWeight($value){
        $this->getLimits()->get("weight")->setValue($value);
        return $this;
    }
    public function setShippingMethod($value){
        return $this->setField("shipping_method",$value);
    }
    public function setCod($value){
        return $this->setField("cod",$value);
    }
    public function withCod(){
        return $this->setCod(true);
    }
    public function withoutCod(){
        return $this->setCod(false);
    }
    public function setCard($value){
        return $this->setField("card",$value);
    }
    public function withCard(){
        return $this->setCard(true);
    }
    public function withoutCard(){
        return $this->setCard(false);
    }
    public function setKladrId($value){
        return $this->setField("kladr_id",$value);
    }
    public function inMoscow(){
        return $this->setField("kladr_id",self::KLADR_MOSCOW);
    }
    public function setCourier($value){
        return $this->setField("courier",$value);
    }
    public function forShiptor(){
        return $this->setCourier(self::COURIER_SHIPTOR);
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
        return DeliveryPointsResult::class;
    }
}