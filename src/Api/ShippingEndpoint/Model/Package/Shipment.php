<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Shipment extends ArrayCollection{
    private $courier;
    private $address;
    public function __construct($elements = []) {
        parent::__construct($elements);
        $this->setCourier();
        $this->setAddress();
    }
    private function setCourier(){
        $this->courier = new ArrayCollection($this->get("courier"));
    }
    private function setAddress(){
        $this->address = new ArrayCollection($this->get("address"));
    }
    public function getCourier(){
        return $this->courier;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getId(){
        return $this->get("id");
    }
    public function getPickupDate(){
        return $this->get("pickup_date");
    }
    public function getPickupTime(){
        return $this->get("pickup_time");
    }
    public function getCourierType(){
        return $this->getCourier()->get("slug");
    }
    public function getCourierName(){
        return $this->getCourier()->get("name");
    }
    public function getReceiver(){
        return $this->getAddress()->get("receiver");
    }
    public function getName(){
        return $this->getAddress()->get("name");
    }
    public function getSurname(){
        return $this->getAddress()->get("surname");
    }
    public function getPatronymic(){
        return $this->getAddress()->get("patronymic");
    }
    public function getEmail(){
        return $this->getAddress()->get("email");
    }
    public function getPhone(){
        return $this->getAddress()->get("phone");
    }
    public function getCountryCode(){
        return $this->getAddress()->get("country_code");
    }
    public function getRegion(){
        return $this->getAddress()->get("administrative_area");
    }
    public function getSettlement(){
        return $this->getAddress()->get("settlement");
    }
    public function getAddressLine(){
        return $this->getAddress()->get("address_line_1");
    }
    public function getPostalCode(){
        return $this->getAddress()->get("postal_code");
    }
    public function getStreet(){
        return $this->getAddress()->get("street");
    }
    public function getHouse(){
        return $this->getAddress()->get("house");
    }
    public function getApartment(){
        return $this->getAddress()->get("apartment");
    }
    public function getKladrId(){
        return $this->getAddress()->get("kladr_id");
    }
}