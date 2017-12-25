<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Request\GenericRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\Countries as CountriesResult;

class GetCountries extends GenericRequest{
    protected $name = "getCountries";
    protected function initFields(){
        //no fields
    }
    public function getResponseClassName() {
        return CountriesResult::class;
    }
}