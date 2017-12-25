<?php
namespace ShiptorRussiaApiClient\Client\Api;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\CalculateShipping,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetCountries,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetDaysOff,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetDeliveryPoints,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetSettlements,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\GetTracking,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request\SuggestSettlement;

class PublicEndpoint{
    protected $calculateShipping;
    protected $getDeliveryPoints;
    protected $getSettlements;
    protected $suggestSettlement;
    protected $getTracking;
    protected $getCountries;
    protected $getDaysOff;

    public function calculateShipping(){
        return $this->calculateShipping = new CalculateShipping();
    }
    public function getDeliveryPoints(){
        return $this->getDeliveryPoints = new GetDeliveryPoints();
    }
    public function getSettlements(){
        return $this->getSettlements = new GetSettlements();
    }
    public function getTracking($trackNum = null){
        $this->getTracking = new GetTracking();
        if(!empty($trackNum)){
            $this->getTracking->query($trackNum);
        }
        return $this->getTracking;
    }
    public function suggestSettlement($query = null){
        $this->suggestSettlement = new SuggestSettlement();
        if(!empty($query)){
            $this->suggestSettlement->query($query);
        }
        return $this->suggestSettlement;
    }
    public function getCountries(){
        return $this->getCountries = new GetCountries();
    }
    public function getDaysOff(){
        return $this->getDaysOff = new GetDaysOff();
    }
}