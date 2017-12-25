<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Model\Country,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as CountriesCollection;

class Countries extends Result{
    private $countries;
    protected function init(){
        $this->setCountriesList();
    }
    private function setCountriesList(){
        $this->countries = new CountriesCollection($this->elements,Country::class);
    }
    public function getCountriesList(){
        return $this->countries;
    }
}