<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product as EditProductResult;

class EditProduct extends AddProduct{
    protected $name = "editProduct";
    protected function initFields(){
        parent::initFields();
        $this->getFieldsCollection()->get('article')->unsetRequired();
    }
    public function setArticle($article){
        throw new \Exception('Not supported!');
    }
    public function setPrice($price){
        throw new \Exception('Not supported!');
    }
    public function getResponseClassName() {
        return EditProductResult::class;
    }
}