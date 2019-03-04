<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\CalculateShipping as CalculateShippingInternationalResult;

class CalculateShippingInternational extends GenericShippingRequest{
    protected $name = 'calculateShippingInternational';
    protected function initFields() {
        $this->getFieldsCollection()
                ->Number('length')->setRequired()->add()
                ->Number('width')->setRequired()->add()
                ->Number('height')->setRequired()->add()
                ->Number('weight')->setRequired()->add()
                ->Number('declared_cost')->setRequired()->add()
                ->Boolean('insurance')->add()
                ->Enum('departure_country_code')->setRequired()->setOptions($this->getAvailableCountriesExport())->add()
                ->Enum('destination_country_code')->setRequired()->setOptions($this->getAvailableCountriesExport())->add()
                ->Enum('courier')->setOptions([GenericShippingRequest::COURIER_DPD])->add();
    }
    public function setLength($value){
        return $this->setField('length', $value);
    }
    public function setWidth($value){
        return $this->setField('width', $value);
    }
    public function setHeight($value){
        return $this->setField('height', $value);
    }
    public function setWeight($value){
        return $this->setField('weight', $value);
    }
    public function setDeclaredCost($value){
        return $this->setField('declared_cost', $value);
    }
    public function setInsurance($value){
        return $this->setField('insurance', $value);
    }
    public function withInsurance(){
        return $this->setInsurance(true);
    }
    public function withoutInsurance(){
        return $this->setInsurance(false);
    }
    public function setCountryFrom($value){
        return $this->setField('departure_country_code', $value);
    }
    public function fromRu(){
        return $this->setCountryFrom(self::COUNTRY_RU);
    }
    public function fromKz(){
        return $this->setCountryFrom(self::COUNTRY_KZ);
    }
    public function fromBy(){
        return $this->setCountryFrom(self::COUNTRY_BY);
    }
    public function setCountryTo($value){
        return $this->setField('destination_country_code', $value);
    }
    public function toRu(){
        return $this->setCountryTo(self::COUNTRY_RU);
    }
    public function toKz(){
        return $this->setCountryTo(self::COUNTRY_KZ);
    }
    public function toBy(){
        return $this->setCountryTo(self::COUNTRY_BY);
    }
    public function setCourier($value){
        return $this->setField('courier', $value);
    }
    public function forDpd(){
        return $this->setCourier(GenericShippingRequest::COURIER_DPD);
    }
    public function getResponseClassName() {
        return CalculateShippingInternationalResult::class;
    }
    public function getAvailableCountriesExport(){
        return [
            'AE', 'AL', 'AT', 'AU', 'AZ',
            'BA', 'BB', 'BD', 'BF', 'BE', 'BG', 'BH', 'BI', 'BJ', 'BM', 'BN', 'BO', 'BR', 'BS', 'BT', 'BW', 'BZ',
            'CA', 'CD', 'CF', 'CG', 'CI', 'CH', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CW', 'CY', 'CZ',
            'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ',
            'EC', 'EE', 'EG', 'ER', 'ES', 'ET',
            'FI', 'FJ', 'FR',
            'GA', 'GB', 'GD', 'GE', 'GH', 'GI', 'GM', 'GN', 'GQ', 'GR', 'GT', 'GY',
            'HK', 'HN', 'HR', 'HT', 'HU',
            'ID', 'IE', 'IL', 'IN', 'IQ', 'IR', 'IS', 'IT',
            'JM', 'JO', 'JP',
            'KE', 'KG', 'KH', 'KN', 'KR', 'KW', 'KY',
            'LA', 'LB', 'LC', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV',
            'MA', 'MD', 'ME', 'MG', 'MK', 'ML', 'MO', 'MR', 'MT', 'MN', 'MM', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ',
            'NA', 'NC', 'NE', 'NG', 'NI', 'NL', 'NO', 'NP', 'NZ',
            'OM',
            'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PT', 'PY',
            'RO', 'RS', 'RW',
            'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SI', 'SK', 'SN', 'SR', 'ST', 'SV', 'SY',
            'TC', 'TD', 'TG', 'TH', 'TT', 'TJ', 'TN', 'TM', 'TR', 'TZ',
            'UA', 'UG', 'US', 'UY', 'UZ',
            'VC', 'VE', 'VN', 'VU',
            'YE',
            'ZA', 'ZM', 'ZW',
        ];
    }
}