<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Provider as DeleteProviderResult;

class DeleteProvider extends GenericShippingRequest{
    protected $name = "removeProvider";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("id")->setRequired()->add();
    }
    public function setId($id){
        return $this->setField("id",$id);
    }
    public function getResponseClassName() {
        return DeleteProviderResult::class;
    }
}