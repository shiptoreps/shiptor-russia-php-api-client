<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Request\GenericRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\SuggestSettlement as SuggestSettlementResult;

class SuggestSettlement extends GenericRequest{
    protected $name = "suggestSettlement";
    protected function initFields(){
        $this->getFieldsCollection()
            ->String("query")->setRequired()->add()
            ->Enum("country_code")->setOptions($this->getAvailableCountries())->add();
    }
    public function query($value){
        return $this->setField("query", $value);
    }
    public function setCountryCode($value){
        return $this->setField("country_code", $value);
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
    public function getResponseClassName() {
        return SuggestSettlementResult::class;
    }
}