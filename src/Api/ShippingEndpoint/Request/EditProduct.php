<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Exception\UnavailableMethod,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product as EditProductResult;

class EditProduct extends AddProduct{
    protected $name = "editProduct";
    protected function initFields(){
        parent::initFields();
        $this->getFieldsCollection()->get('article')->unsetRequired();
    }
    public function setArticle($article){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setSku($sku){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setBrand($brand){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function setPrice($price){
        throw new UnavailableMethod(array(__FUNCTION__,__CLASS__));
    }
    public function getResponseClassName() {
        return EditProductResult::class;
    }
}