<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\PackageStatuses as GetPackagesCurrentStatusResult;

class GetPackagesCurrentStatus extends GenericShippingRequest{
    protected $name = "getPackagesCurrentStatus";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("ids")->setRequired()->setMulty()->add()
                ->String("status_at_since")->add();
    }
    public function setIds($arIds){
        return $this->setField('ids', $arIds);
    }
    public function setStatusSince($dateTime){
        return $this->setField('status_at_since', $dateTime);
    }
    public function getResponseClassName() {
        return GetPackagesCurrentStatusResult::class;
    }
}