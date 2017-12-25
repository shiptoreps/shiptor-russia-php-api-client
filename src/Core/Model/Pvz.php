<?php
namespace ShiptorRussiaApiClient\Client\Core\Model;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Pvz extends ArrayCollection{
    private $geolocation;
    private $limits;
    private $maxWeight;
    private $maxDimensions = [];
    private $prepareAddress = [];
    public function __construct($elements = array()) {
        parent::__construct($elements);
        $this->setGeolocation();
        $this->setLimits();
        $this->setMaxWeight();
        $this->setMaxDimensions();
        $this->setPrepareAddress();
    }
    public function setGeolocation(){
        $this->geolocation = new ArrayCollection($this->get("gps_location"));
    }
    public function setLimits(){
        $this->limits = new ArrayCollection($this->get("limits"));
    }
    public function setMaxWeight(){
        $this->maxWeight = new ArrayCollection($this->getLimits()->get("max_weight"));
    }
    public function hasMaxWeight(){
        return $this->hasValue('maxWeight');
    }
    public function setMaxDimensions(){
        $this->maxDimensions = new ArrayCollection($this->getLimits()->get("max_dimensions"));
    }
    public function hasMaxDimensions(){
        return $this->hasValue('maxDimensions');
    }
    public function setPrepareAddress(){
        $this->prepareAddress = new ArrayCollection($this->get("prepare_address"));
    }
    public function hasPrepareAddress(){
        return $this->hasValue('prepare_address');
    }
    public function getId(){
        return $this->get("id");
    }
    public function getCourier(){
        return $this->get("courier");
    }
    public function getAddress(){
        return $this->get("address");
    }
    public function getPhones(){
        return $this->get("phones");
    }
    public function getDescription(){
        return $this->get("trip_description");
    }
    public function getSchedule(){
        return $this->get("work_schedule");
    }
    public function getShippingDays(){
        return $this->get("shipping_days");
    }
    public function getCod(){
        return $this->get("cod");
    }
    public function getGeolocation(){
        return $this->geolocation;
    }
    public function getLongitude(){
        return $this->getGeolocation()->get("longitude");
    }
    public function getLatitude(){
        return $this->getGeolocation()->get("latitude");
    }
    public function getKladrId(){
        return $this->get("kladr_id");
    }
    public function getShippingMethods(){
        return $this->get("shipping_methods");
    }
    public function getLimits(){
        return $this->limits;
    }
    public function getMaxWeightValue(){
        return $this->getMaxWeight()->get("value");
    }
    public function getMaxWeightUnit(){
        return $this->getMaxWeight()->get("unit");
    }
    public function getMaxDimensions(){
        return $this->maxDimensions;
    }
    public function getMaxLength(){
        return $this->getMaxDimensions()->get("length");
    }
    public function getMaxWidth(){
        return $this->getMaxDimensions()->get("width");
    }
    public function getMaxHeight(){
        return $this->getMaxDimensions()->get("height");
    }
    public function getMaxDimensionsUnit(){
        return $this->getMaxDimensions()->get("unit");
    }
    public function isSelfPickup(){
        return $this->getLimits()->get("self_pick_up");
    }
    public function isEconomy(){
        return $this->getLimits()->get("economy");
    }
    public function getPrepareAddress(){
        return $this->prepareAddress;
    }
    public function getPrepareAddressRegion(){
        return $this->getPrepareAddress()->get("administrative_area");
    }
    public function getPrepareAddressSettlement(){
        return $this->getPrepareAddress()->get("settlement");
    }
    public function getPrepareAddressStreet(){
        return $this->getPrepareAddress()->get("street");
    }
    public function getPrepareAddressHouse(){
        return $this->getPrepareAddress()->get("house");
    }
    public function getPrepareAddressPostalCode(){
        return $this->getPrepareAddress()->get("postal_code");
    }
}