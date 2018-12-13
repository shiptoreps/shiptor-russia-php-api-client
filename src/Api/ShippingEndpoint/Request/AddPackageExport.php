<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackage\ExportProduct as PackageProduct,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddPackage\Service as PackageService,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage as AddPackageResult;

class AddPackageExport extends GenericShippingRequest{
    protected $name = "addPackage";
    protected function initFields(){
        $this->getFieldsCollection()
            ->Number("stock")->add()
            ->Number("length")->setRequired()->add()
            ->Number("width")->setRequired()->add()
            ->Number("height")->setRequired()->add()
            ->Number("weight")->setRequired()->add()
            ->Boolean("is_fulfilment")->add()
            ->Boolean("no_gather")->add()
            ->String("external_id")->add()
            ->Collection("departure")
                ->Number("shipping_method")->setRequired()->add()
                ->Number("delivery_point")->add()
                ->Boolean("cashless_payment")->add()
                ->String("comment")->add()
                ->Collection("address")
                    ->Enum("country")->setOptions($this->getAvailableCountriesExport())->setRequired()->add()
                    ->String("receiver")->setRequired()->add()
                    ->String("email")->setRequired()->add()
                    ->String("phone")->setRequired()->add()
                    ->String("postal_code")->add()
                    ->String("administrative_area")->add()
                    ->String("settlement")->add()
                    ->String("street")->add()
                    ->String("house")->add()
                    ->String("apartment")->add()
                    ->String("address_line_1")->add()
                ->endCollection()
            ->endCollection()
            ->Custom("products",PackageProduct::class)->setRequired()->setMulty()->add()
            ->String("photos")->setMulty()->add()
            ->Custom("services",PackageService::class)->setMulty()->add();
    }
    public function validate(){
        $pvz = $this->getDeparture()->get('delivery_point')->getValue();
        if(empty($pvz)){
            $street = $this->getAddress()->get('street')->getValue();
            $house = $this->getAddress()->get('house')->getValue();
            $addressLine = $this->getAddress()->get('address_line_1')->getValue();
            if(empty($street) && empty($house)){
                $this->getAddress()->get('address_line_1')->setRequired();
            }else{
                if(empty($street) || empty($house)){
                    $this->getAddress()->get('street')->setRequired();
                    $this->getAddress()->get('house')->setRequired();
                }
            }
        }
        parent::validate();
    }
    public function setStock($stockId){
        return $this->setField("stock", $stockId);
    }
    public function setDimensions($arLimits){
        $this->setLength($arLimits["LENGTH"]);
        $this->setWidth($arLimits["WIDTH"]);
        $this->setHeight($arLimits["HEIGHT"]);
        $this->setWeight($arLimits["WEIGHT"]);
        return $this;
    }
    public function setLength($length){
        return $this->setField("length", $length);
    }
    public function setWidth($width){
        return $this->setField("width", $width);
    }
    public function setHeight($height){
        return $this->setField("height", $height);
    }
    public function setWeight($weight){
        return $this->setField("weight", $weight);
    }
    public function setFulfillment($fulfilment){
        return $this->setField("is_fulfilment", $fulfilment);
    }
    public function withFulfillment(){
        return $this->setField("is_fulfilment", true);
    }
    public function noFulfillment(){
        return $this->setField("is_fulfilment", false);
    }
    public function setNoGather($noGather){
        return $this->setField("no_gather", $noGather);
    }
    public function noGather(){
        return $this->setField("no_gather", true);
    }
    public function yesGather(){
        return $this->setField("no_gather", false);
    }
    public function setExternalId($externalId){
        return $this->setField("external_id", $externalId);
    }
    public function getDeparture(){
        return $this->getFieldsCollection()->get("departure");
    }
    public function getAddress(){
        return $this->getDeparture()->get("address");
    }
    public function setShippingMethod($shippingMethod){
        $this->getDeparture()->get("shipping_method")->setValue($shippingMethod);
        return $this;
    }
    public function setDeliveryPoint($deliveryPoint){
        $this->getDeparture()->get("delivery_point")->setValue($deliveryPoint);
        return $this;
    }
    public function setComment($comment){
        $this->getDeparture()->get("comment")->setValue($comment);
        return $this;
    }
    public function setCountryCode($code){
        $this->getAddress()->get("country")->setValue($code);
        return $this;
    }
    public function setReciever($receiver){
        $this->getAddress()->get("receiver")->setValue($receiver);
        return $this;
    }
    public function setEmail($email){
        $this->getAddress()->get("email")->setValue($email);
        return $this;
    }
    public function setPhone($phone){
        $this->getAddress()->get("phone")->setValue($phone);
        return $this;
    }
    public function setPostalCode($postCode){
        $this->getAddress()->get("postal_code")->setValue($postCode);
        return $this;
    }
    public function setRegion($region){
        $this->getAddress()->get("administrative_area")->setValue($region);
        return $this;
    }
    public function setSettlement($city){
        $this->getAddress()->get("settlement")->setValue($city);
        return $this;
    }
    public function setStreet($street){
        $this->getAddress()->get("street")->setValue($street);
        return $this;
    }
    public function setHouse($house){
        $this->getAddress()->get("house")->setValue($house);
        return $this;
    }
    public function setApartment($flat){
        $this->getAddress()->get("apartment")->setValue($flat);
        return $this;
    }
    public function setAddressLine($address){
        $this->getAddress()->get("address_line_1")->setValue($address);
        return $this;
    }
    public function newProduct(){
        return $this->getFieldsCollection()->get('products')->_new();
    }
    public function newService(){
        return $this->getFieldsCollection()->get('services')->_new();
    }
    public function getResponseClassName() {
        return AddPackageResult::class;
    }
}