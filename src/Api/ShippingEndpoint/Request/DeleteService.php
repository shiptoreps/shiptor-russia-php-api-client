<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Service as DeleteServiceResult;

class DeleteService extends GenericShippingRequest{
    protected $name = "deleteService";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("shopArticle")->setRequired()->add();
    }
    public function setShopArticle($article){
        return $this->setField("shopArticle",$article);
    }
    public function getResponseClassName() {
        return DeleteServiceResult::class;
    }
}