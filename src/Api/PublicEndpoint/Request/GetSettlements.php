<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\Settlements as SettlementsResult;

class GetSettlements extends GenericRequest{
    protected $name = "getSettlements";
    public function __construct(){
        parent::__construct();
    }
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("per_page")->setRequired()->add()
                ->Number("page")->setRequired()->add()
                ->Enum("types")->setMulty()->setOptions($this->getSettlementTypes())->add()
                ->Number("level")->add()
                ->String("parent")->add()
                ->Enum("country_code")->setRequired()->setOptions($this->getAvailableCountries())->add();
    }
    public function setPageSize($value){
        return $this->setField("per_page", $value);
    }
    public function setPage($value){
        return $this->setField("page", $value);
    }
    public function setType($value){
        return $this->setField("types", $value);
    }
    public function onlyRegions(){
        return $this->setField("types", array(
            self::SETTLEMENT_TYPE_OBLAST, self::SETTLEMENT_TYPE_KRAJ, self::SETTLEMENT_TYPE_RESP));
    }
    public function onlyCities(){
        return $this->setField("types", self::SETTLEMENT_TYPE_CITY);
    }
    public function onlyOblast(){
        return $this->setField("types", self::SETTLEMENT_TYPE_OBLAST);
    }
    public function onlyKraj(){
        return $this->setField("types", self::SETTLEMENT_TYPE_KRAJ);
    }
    public function onlyRespublic(){
        return $this->setField("types", self::SETTLEMENT_TYPE_RESP);
    }
    public function setLevel($value){
        return $this->setField("level", $value);
    }
    public function setParentKladr($value){
        return $this->setField("parent", $value);
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
        return SettlementsResult::class;
    }
}