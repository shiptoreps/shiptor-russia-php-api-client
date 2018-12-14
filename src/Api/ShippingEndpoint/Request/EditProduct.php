<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product as EditProductResult;

class EditProduct extends AddProduct{
    protected $name = "editProduct";
    protected function initFields(){
        parent::initFields();
        $this->getFieldsCollection()->remove('article');
        $this->getFieldsCollection()->remove('brand');
        $this->getFieldsCollection()->remove('price');
    }
    public function getResponseClassName() {
        return EditProductResult::class;
    }
}