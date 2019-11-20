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

        $this->getFieldsCollection()->get('departure')->get('address')->get('country')->setOptions(self::getAvailableCountriesExport());
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
    public static function getAvailableCountriesExport(){
        return [
            'AB', 'AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ',
            'BA', 'BB', 'BD', 'BF', 'BE', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BZ',
            'CA', 'CC', 'CD', 'CF', 'CG', 'CI', 'CH', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ',
            'DE', 'DJ', 'DK', 'DM', 'DN', 'DO', 'DZ',
            'EC', 'EE', 'EH', 'EG', 'ER', 'ES', 'ET',
            'FI', 'FJ', 'FK', 'FM', 'FO', 'FR',
            'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS','GT', 'GU', 'GW', 'GY',
            'HK', 'HM', 'HN', 'HR', 'HT', 'HU',
            'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT',
            'JE', 'JM', 'JO', 'JP',
            'KE', 'KG', 'KI', 'KH', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY',
            'LA', 'LB', 'LC', 'LI', 'LK', 'LN', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY',
            'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'ML', 'MN', 'MM', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ',
            'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NR', 'NP', 'NU', 'NZ',
            'OM', 'OS',
            'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY',
            'QA',
            'RE', 'RO', 'RS', 'RW',
            'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SN', 'SM', 'SO', 'SS', 'SR', 'ST', 'SV', 'SX', 'SY', 'SZ',
            'TC', 'TD', 'TF', 'TG', 'TH', 'TT', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TR', 'TV', 'TW', 'TZ',
            'UA', 'UG', 'UM', 'US', 'UY', 'UZ',
            'WS', 'WF',
            'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU',
            'YE', 'YT',
            'ZA', 'ZM', 'ZW',
        ];
    }
    public function getAvailableAdditionalServices(){
        return array(self::AS_EXPRESS_GATHERING, self::AS_ADDITIONAL_PACK, self::AS_PACKAGE_INSURANCE);
    }
}