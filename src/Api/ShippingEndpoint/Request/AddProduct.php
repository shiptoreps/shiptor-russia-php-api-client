<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product as AddProductResult;

class AddProduct extends GenericShippingRequest{
    protected $name = "addProduct";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("name")->setRequired()->add()
                ->String("barcode")->add()
                ->String("article")->setRequired()->add()
                ->String("shopArticle")->setRequired()->add()
                ->String("url")->add()
                ->Number("length")->add()
                ->Number("width")->add()
                ->Number("height")->add()
                ->Number("weight")->add()
                ->Number("price")->add()
                ->Number("retailPrice")->add()
                ->Boolean("fragile")->add()
                ->Boolean("danger")->add()
                ->Boolean("perishable")->add()
                ->Boolean("needBox")->add()
                ->Boolean("adult")->add();
    }
    public function setName($name){
        return $this->setField("name",$name);
    }
    public function setBarcode($barcode){
        return $this->setField("barcode",$barcode);
    }
    public function setArticle($article){
        return $this->setField("article",$article);
    }
    public function setShopArticle($article){
        return $this->setField("shopArticle",$article);
    }
    public function setUrl($url){
        return $this->setField("url",$url);
    }
    public function setLength($length){
        return $this->setField("length",$length);
    }
    public function setWidth($width){
        return $this->setField("width",$width);
    }
    public function setHeight($height){
        return $this->setField("height",$height);
    }
    public function setWeight($weight){
        return $this->setField("weight",$weight);
    }
    public function setPrice($price){
        return $this->setField("price",$price);
    }
    public function setRetailPrice($price){
        return $this->setField("retailPrice",$price);
    }
    public function setFragile($fragile){
        return $this->setField("fragile",$fragile);
    }
    public function fragile(){
        return $this->setFragile(true);
    }
    public function notFragile(){
        return $this->setFragile(false);
    }
    public function setDanger($danger){
        return $this->setField("danger",$danger);
    }
    public function dangerous(){
        return $this->setDanger(true);
    }
    public function notDangerous(){
        return $this->setDanger(false);
    }
    public function setPerishable($perishable){
        return $this->setField("perishable",$perishable);
    }
    public function perishable(){
        return $this->setPerishable(true);
    }
    public function notPerishable(){
        return $this->setPerishable(false);
    }
    public function setNeedBox($danger){
        return $this->setField("needBox",$danger);
    }
    public function boxNeeded(){
        return $this->setNeedBox(true);
    }
    public function boxNotNeeded(){
        return $this->setNeedBox(false);
    }
    public function setAdult($adult){
        return $this->setField("adult",$adult);
    }
    public function adult(){
        return $this->setAdult(true);
    }
    public function getResponseClassName() {
        return AddProductResult::class;
    }
}