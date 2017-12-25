<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package as GetPackageResult;

class GetPackage extends GenericShippingRequest{
    protected $name = "getPackage";
    protected function initFields(){
        $this->getFieldsCollection()
                ->Number("id")->add()
                ->String("external_id")->add();
    }
    public function setId($id){
        return $this->setField("id",$id);
    }
    public function setExternalId($externalId){
        return $this->setField("external_id",$externalId);
    }
    public function getResponseClassName() {
        return GetPackageResult::class;
    }
}