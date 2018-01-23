<?php
namespace ShiptorRussiaApiClient\Client\Api;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request as PublicRequest;

class PublicEndpoint{
    protected $calculateShipping;
    protected $getDeliveryPoints;
    protected $getSettlements;
    protected $suggestSettlement;
    protected $getTracking;
    protected $getCountries;
    protected $getDaysOff;

    public function calculateShipping(){
        return $this->calculateShipping = new PublicRequest\CalculateShipping();
    }
    public function getDeliveryPoints(){
        return $this->getDeliveryPoints = new PublicRequest\GetDeliveryPoints();
    }
    public function getSettlements(){
        return $this->getSettlements = new PublicRequest\GetSettlements();
    }
    public function getTracking($trackNum = null){
        $this->getTracking = new PublicRequest\GetTracking();
        if(!empty($trackNum)){
            $this->getTracking->query($trackNum);
        }
        return $this->getTracking;
    }
    public function suggestSettlement($query = null){
        $this->suggestSettlement = new PublicRequest\SuggestSettlement();
        if(!empty($query)){
            $this->suggestSettlement->query($query);
        }
        return $this->suggestSettlement;
    }
    public function getCountries(){
        return $this->getCountries = new PublicRequest\GetCountries();
    }
    public function getDaysOff(){
        return $this->getDaysOff = new PublicRequest\GetDaysOff();
    }
}