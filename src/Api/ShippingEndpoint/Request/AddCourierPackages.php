<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackages\Package,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackages as AddPackagesResult;

class AddCourierPackages extends GenericShippingRequest{
    protected $name = "addPackages";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Collection("shipment")
                    ->String("type")->setRequired()->add()
                    ->Enum("courier")->setRequired()->setOptions($this->getAvailableCouriers())->add()
                    ->Collection("address")
                        ->String("receiver")->setRequired()->add()
                        ->String("name")->add()
                        ->String("surname")->add()
                        ->String("patronymic")->add()
                        ->String("email")->add()
                        ->String("phone")->setRequired()->add()
                        ->Enum("country")->setRequired()->setOptions($this->getAvailableCountries())->add()
                        ->String("administrative_area")->setRequired()->add()
                        ->String("settlement")->setRequired()->add()
                        ->String("postal_code")->setRequired()->add()
                        ->String("street")->setRequired()->add()
                        ->String("house")->setRequired()->add()
                        ->String("apartment")->add()
                        ->String("kladr_id")->setRequired()->add()
                    ->endCollection()
                    ->String("date")->setRequired()->add()
                    ->String("comment")->setRequired()->add()
                ->endCollection()
                ->Custom("packages", Package::class)->setMulty()->setRequired()->add();
        $this->setType("courier");
    }
    public function getShipment(){
        return $this->getFieldsCollection()->get("shipment");
    }
    private function setType($type){
        $this->getShipment()->get("type")->setValue($type);
        return $this;
    }
    public function setCourier($courier){
        $this->getShipment()->get("courier")->setValue($courier);
        return $this;
    }
    public function forBoxBerry(){
        return $this->setCourier(self::COURIER_BOXBERRY);
    }
    public function forCdek(){
        return $this->setCourier(self::COURIER_CDEK);
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
    public function forRusPost(){
        return $this->setCourier(self::COURIER_RUSSIAN_POST);
    }
    public function forShiptor(){
        return $this->setCourier(self::COURIER_SHIPTOR);
    }
    public function forShiptor1Day(){
        return $this->setCourier(self::COURIER_SHIPTOR_1DAY);
    }
    public function forShiptorOversize(){
        return $this->setCourier(self::COURIER_SHIPTOR_OVERSIZE);
    }
    public function forSprs(){
        return $this->setCourier(self::COURIER_SPSR);
    }
    public function getAddress(){
        return $this->getShipment()->get("address");
    }
    public function setReciever($reciever){
        $this->getAddress()->get("receiver")->setValue($reciever);
        return $this;
    }
    public function setName($name){
        $this->getAddress()->get("name")->setValue($name);
        return $this;
    }
    public function setSurname($surname){
        $this->getAddress()->get("surname")->setValue($surname);
        return $this;
    }
    public function setPatronymic($patronymic){
        $this->getAddress()->get("patronymic")->setValue($patronymic);
        return $this;
    }
    public function setEmail($email){
        $this->getAddress()->get("email")->setValue($email);
        return $this;
    }
    public function setPhone($phone){
        $this->getAddress()->get("phone")->setValue($phone);
        return $this;
    }
    public function setCountry($country){
        $this->getAddress()->get("country")->setValue($country);
        return $this;
    }
    public function fromRu(){
        return $this->setCountry(self::COUNTRY_RU);
    }
    public function fromKz(){
        return $this->setCountry(self::COUNTRY_KZ);
    }
    public function fromBy(){
        return $this->setCountry(self::COUNTRY_BY);
    }
    public function setRegion($region){
        $this->getAddress()->get("administrative_area")->setValue($region);
        return $this;
    }
    public function setSettlement($city){
        $this->getAddress()->get("settlement")->setValue($city);
        return $this;
    }
    public function setPostalCode($postalCode){
        $this->getAddress()->get("postal_code")->setValue($postalCode);
        return $this;
    }
    public function setStreet($street){
        $this->getAddress()->get("street")->setValue($street);
        return $this;
    }
    public function setHouse($house){
        $this->getAddress()->get("house")->setValue($house);
        return $this;
    }
    public function setApartment($apartment){
        $this->getAddress()->get("apartment")->setValue($apartment);
        return $this;
    }
    public function setKladrId($kladrId){
        $this->getAddress()->get("kladr_id")->setValue($kladrId);
        return $this;
    }
    public function setDate($date){
        $convertedDate = date("d.m.Y",strtotime($date));
        $this->getShipment()->get("date")->setValue($convertedDate);
        return $this;
    }
    public function setComment($comment){
        $this->getShipment()->get("comment")->setValue($comment);
        return $this;
    }
    public function newPackage(){
        return $this->getFieldsCollection()->get("packages")->_new();
    }
    public function getResponseClassName() {
        return AddPackagesResult::class;
    }
}