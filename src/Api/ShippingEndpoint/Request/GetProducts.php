<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Products as GetProductsResult;

class GetProducts extends GenericShippingRequest{
    protected $name = "getProducts";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("shopArticle")->add()
                ->Number("page")->setRequired()->add()
                ->Number("per_page")->setRequired()->add()
                ->String("query")->add()
                ->String('except')->setMulty()->add();
    }
    public function setShopArticle($shopArticle){
        return $this->setField("shopArticle",$shopArticle);
    }
    public function setPage($page){
        return $this->setField("page",$page);
    }
    public function setPageSize($pageSize){
        return $this->setField("per_page",$pageSize);
    }
    public function fetchSingleProduct($shopArticle){
        $this->getFieldsCollection()->get('shopArticle')->setRequired();
        $this->setPage(1);
        $this->setPageSize(1);
        return $this->setShopArticle($shopArticle);
    }    
    public function getResponseClassName() {
        return GetProductsResult::class;
    }
}