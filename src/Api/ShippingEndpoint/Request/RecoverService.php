<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Services as GetServicesResult;

class RecoverService extends GenericShippingRequest{
    protected $name = "recoverService";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String('shopArticle')->setRequired()->add();
    }
    public function setShopArticle($query){
        return $this->setField("shopArticle", $query);
    }
    public function getResponseClassName() {
        return GetServicesResult::class;
    }
}