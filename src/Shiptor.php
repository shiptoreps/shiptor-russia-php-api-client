<?php
namespace ShiptorRussiaApiClient\Client;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint,
    ShiptorRussiaApiClient\Client\Core\Configuration;

class Shiptor{
    public function __construct($arParams = []) {
        if(isset($arParams["API_KEY"]) && !empty($arParams["API_KEY"])){
            Configuration::setApiKey($arParams["API_KEY"]);
        }
        if(isset($arParams["ENCODING"]) && !empty($arParams["ENCODING"])){
            Configuration::setEncoding($arParams["ENCODING"]);
        }
        if(isset($arParams["NAME"]) && !empty($arParams["NAME"])){
            Configuration::setName($arParams["NAME"]);
        }
    }
    public function PublicEndpoint(){
        return new PublicEndpoint();
    }
    public function ShippingEndpoint(){
        return new ShippingEndpoint();
    }
}