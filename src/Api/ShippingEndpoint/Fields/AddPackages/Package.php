<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackages;

use ShiptorRussiaApiClient\Client\Core\Fields\Custom,
    ShiptorRussiaApiClient\Client\Core\Request\GenericRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackage\Product as PackageProduct,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackage\Service as PackageService;

class Package extends Custom{
    protected function setFields(){
        $this->getFieldsCollection()
            ->Number("stock")->add()
            ->Number("length")->setRequired()->add()
            ->Number("width")->setRequired()->add()
            ->Number("height")->setRequired()->add()
            ->Number("weight")->setRequired()->add()
            ->Number("cod")->setRequired()->add()
            ->Number("declared_cost")->setRequired()->add()
            ->String("external_id")->add()
            ->Collection("departure")
                ->Number("shipping_method")->setRequired()->add()
                ->Number("delivery_point")->add()
                ->Boolean("cashless_payment")->add()
                ->String("comment")->add()
                ->Collection("address")
                    ->Enum("country")->setRequired()->setOptions($this->getCollection()->getEntity()->getAvailableCountries())->add()
                    ->String("name")->add()
                    ->String("surname")->add()
                    ->String("patronymic")->add()
                    ->String("receiver")->add()
                    ->String("email")->setRequired()->add()
                    ->String("phone")->setRequired()->add()
                    ->String("postal_code")->add()
                    ->String("administrative_area")->add()
                    ->String("settlement")->add()
                    ->String("street")->add()
                    ->String("house")->add()
                    ->String("apartment")->add()
                    ->String("address_line_1")->add()
                    ->String("kladr_id")->setRequired()->add()
                ->endCollection()
            ->endCollection()
            ->Custom("products",PackageProduct::class)->setRequired()->setMulty()->add()
            ->String("photos")->setMulty()->add()
            ->Custom("services",PackageService::class)->setMulty()->add();
    }
    public function setStock($id){
        $this->getFieldsCollection()->get('stock')->setValue($id);
        return $this;
    }
    public function setLength($length){
        $this->getFieldsCollection()->get('length')->setValue($length);
        return $this;
    }
    public function setWidth($width){
        $this->getFieldsCollection()->get('width')->setValue($width);
        return $this;
    }
    public function setHeight($height){
        $this->getFieldsCollection()->get('height')->setValue($height);
        return $this;
    }
    public function setWeight($weight){
        $this->getFieldsCollection()->get('weight')->setValue($weight);
        return $this;
    }
    public function setCod($cod){
        $this->getFieldsCollection()->get('cod')->setValue($cod);
        return $this;
    }
    public function setDeclaredCost($declaredCost){
        $this->getFieldsCollection()->get('declared_cost')->setValue($declaredCost);
        return $this;
    }
    public function setExternalId($externalId){
        $this->getFieldsCollection()->get('external_id')->setValue($externalId);
        return $this;
    }
    public function getDeparture(){
        return $this->getFieldsCollection()->get('departure');
    }
    public function setShippingMethod($shippingMethod){
        $this->getDeparture()->get('shipping_method')->setValue($shippingMethod);
        return $this;
    }
    public function setDeliveryPoint($deliveryPoint){
        $this->getDeparture()->get('delivery_point')->setValue($deliveryPoint);
        return $this;
    }
    public function setCashlessPayment($cashlessPayment){
        $this->getDeparture()->get('cashless_payment')->setValue($cashlessPayment);
        return $this;
    }
    public function payByCard(){
        return $this->setCashlessPayment(true);
    }
    public function setComment($comment){
        $this->getDeparture()->get('comment')->setValue($comment);
        return $this;
    }
    public function getAddress(){
        return $this->getDeparture()->get('address');
    }
    public function setCountry($contry){
        $this->getAddress()->get('country')->setValue($contry);
        return $this;
    }
    public function toRu(){
        return $this->setCountry(GenericRequest::COUNTRY_RU);
    }
    public function toBy(){
        return $this->setCountry(GenericRequest::COUNTRY_BY);
    }
    public function toKz(){
        return $this->setCountry(GenericRequest::COUNTRY_KZ);
    }
    public function setName($name){
        $this->getAddress()->get('name')->setValue($name);
        return $this;
    }
    public function setSurname($surname){
        $this->getAddress()->get('surname')->setValue($surname);
        return $this;
    }
    public function setPatronymic($patronymic){
        $this->getAddress()->get('patronymic')->setValue($patronymic);
        return $this;
    }
    public function setReceiver($receiver){
        $this->getAddress()->get('receiver')->setValue($receiver);
        return $this;
    }
    public function setEmail($email){
        $this->getAddress()->get('email')->setValue($email);
        return $this;
    }
    public function setPhone($phone){
        $this->getAddress()->get('phone')->setValue($phone);
        return $this;
    }
    public function setPostalCode($postalCode){
        $this->getAddress()->get('postal_code')->setValue($postalCode);
        return $this;
    }
    public function setRegion($region){
        $this->getAddress()->get('administrative_area')->setValue($region);
        return $this;
    }
    public function setSettlement($city){
        $this->getAddress()->get('settlement')->setValue($city);
        return $this;
    }
    public function setStreet($street){
        $this->getAddress()->get('street')->setValue($street);
        return $this;
    }
    public function setHouse($house){
        $this->getAddress()->get('house')->setValue($house);
        return $this;
    }
    public function setApartment($apartment){
        $this->getAddress()->get('apartment')->setValue($apartment);
        return $this;
    }
    public function setAddressLine($addressLine){
        $this->getAddress()->get('address_line_1')->setValue($addressLine);
        return $this;
    }
    public function setKladrId($kladrId){
        $this->getAddress()->get('kladr_id')->setValue($kladrId);
        return $this;
    }
    public function toMoscow(){
        $this->getAddress()->get('kladr_id')->setValue(GenericRequest::KLADR_MOSCOW);
        return $this;
    }
    public function newProduct(){
        return $this->getFieldsCollection()->get("products")->_new();
    }
    public function newService(){
        return $this->getFieldsCollection()->get("services")->_new();
    }
    public function checkSingleValue($value){
        return is_array($value);
    }
    public function convertValue($value) {
        return (array)$value;
    }
}