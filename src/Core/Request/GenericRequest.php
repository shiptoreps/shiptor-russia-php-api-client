<?php
namespace ShiptorRussiaApiClient\Client\Core\Request;

use ShiptorRussiaApiClient\Client\Core\Collection\FieldsCollection,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse,
    ShiptorRussiaApiClient\Client\Core\Response\GenericResponse;

abstract class GenericRequest{
    protected $fields;
    protected $type = "POST";
    protected $name;
    public function __construct(){
        $this->setFieldsCollection();
        $this->initFields();
    }
    public function validate(){
        $this->getFieldsCollection()->validate();
    }
    protected function setField($name,$value){
        $this->getFieldsCollection()->get($name)->setValue($value);
        return $this;
    }
    protected function setFieldsCollection(){
        $this->fields = new FieldsCollection($this);
    }
    public function send(){
        try{
            $this->validate();
            $data = $this->getFieldsCollection()->toArray();
            $client = $this->getClient();
            return $this->setResponse($client->call($this->getMethodName(),$data));
        }catch(\Exception $e){
            return new ErrorResponse($e->getMessage());
        }
    }
    public function setResponse($response){
        $responseClassName = $this->getResponseClassName();
        return new GenericResponse($response,$responseClassName);
    }
    public function getMethodName(){
        return $this->name;
    }
    abstract protected function getClient();
    protected function getFieldsCollection(){
        return $this->fields;
    }
    abstract public function getResponseClassName();
    abstract protected function initFields();

    public function getAvailableCountries(){
        return [
            self::COUNTRY_RU,
            self::COUNTRY_KZ,
            self::COUNTRY_BY,
        ];
    }

    public function getAvailableCouriers(){
        return [
            self::COURIER_SHIPTOR,
            self::COURIER_SHIPTOR_1DAY,
            self::COURIER_SHIPTOR_OVERSIZE,
            self::COURIER_BOXBERRY,
            self::COURIER_DPD,
            self::COURIER_IML,
            self::COURIER_RUSSIAN_POST,
            self::COURIER_PICKPOINT,
            self::COURIER_CDEK
        ];
    }
    public function getAbailablePvzCouriers(){
        return [
            self::COURIER_SHIPTOR,
            self::COURIER_BOXBERRY,
            self::COURIER_DPD,
            self::COURIER_IML,
            self::COURIER_PICKPOINT,
            self::COURIER_CDEK,
            self::COURIER_SBER
        ];
    }
    public function getSettlementTypes(){
        return[
            self::SETTLEMENT_TYPE_CITY,
            self::SETTLEMENT_TYPE_OBLAST,
            self::SETTLEMENT_TYPE_KRAJ,
            self::SETTLEMENT_TYPE_RESP
        ];
    }
    const COUNTRY_RU = "RU";
    const COUNTRY_KZ = "KZ";
    const COUNTRY_BY = "BY";

    const COURIER_SHIPTOR = "shiptor";
    const COURIER_SHIPTOR_1DAY = "shiptor-one-day";
    const COURIER_SHIPTOR_OVERSIZE = "shiptor-oversize";
    const COURIER_B2C = "b2c";
    const COURIER_BOXBERRY = "boxberry";
    const COURIER_DPD = "dpd";
    const COURIER_IML = "iml";
    const COURIER_RUSSIAN_POST = "russian-post";
    const COURIER_PICKPOINT = "pickpoint";
    const COURIER_CDEK = "cdek";
    const COURIER_SBER = 'sberlogistics';

    const SETTLEMENT_TYPE_CITY = "Город";
    const SETTLEMENT_TYPE_OBLAST = "Область";
    const SETTLEMENT_TYPE_KRAJ = "Край";
    const SETTLEMENT_TYPE_RESP = "Республика";
    const KLADR_MOSCOW = "77000000000";
}