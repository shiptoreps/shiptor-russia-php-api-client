<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Product as DeleteProductResult;

class DeleteProduct extends GenericShippingRequest{
    protected $name = "deleteProduct";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("shopArticle")->setRequired()->add();
    }
    public function setShopArticle($article){
        return $this->setField("shopArticle",$article);
    }
    public function getResponseClassName() {
        return DeleteProductResult::class;
    }
}