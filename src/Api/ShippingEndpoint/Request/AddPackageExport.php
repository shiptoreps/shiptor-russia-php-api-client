<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Exception\UnavailableMethod,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage as AddPackageResult,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackage\ExportProduct as PackageProduct;

class AddPackageExport extends AddPackage{
    protected function initFields(){
        parent::initFields();
        $this->getFieldsCollection()
                ->remove('stock')
                ->remove('cod')
                ->remove('declared_cost')
                ->remove('services')
                ->remove('products')
                ->get('departure')
                    ->remove('delivery_point')
                    ->remove('cashless_payment')
                    ->get('address')
                        ->remove('name')
                        ->remove('surname')
                        ->remove('patronymic')
                        ->remove('street')
                        ->remove('house')
                        ->remove('apartment')
                        ->remove('kladr_id');

        $this->getFieldsCollection()->get('departure')->get('address')->get('country')->setOptions($this->getAvailableCountriesExport());
        $this->getFieldsCollection()->get('departure')->get('address')->get('address_line_1')->setRequired();
        $this->getFieldsCollection()->get('departure')->get('address')->get('postal_code')->setRequired();
        $this->getFieldsCollection()->get('departure')->get('address')->get('settlement')->setRequired();
        $this->getFieldsCollection()->get('departure')->get('address')->String('address_line_2')->add();
        $this->getFieldsCollection()->Custom('products', PackageProduct::class)->setRequired()->setMulty()->add();
    }
    public function validate(){
        $this->getFieldsCollection()->validate();
    }
    public function setStock($stockId){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setCod($cod){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setDeclaredCost($declaredCost){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setDeliveryPoint($deliveryPoint){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setCashlessPayment($cashlessPayment){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setName($name){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setSurname($surname){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setPatronimic($patronimic){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setKladrId($kladr){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function newService(){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setAddressLine2($address){
        $this->getAddress()->get("address_line_2")->setValue($address);
        return $this;
    }
    public function getResponseClassName() {
        return AddPackageResult::class;
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