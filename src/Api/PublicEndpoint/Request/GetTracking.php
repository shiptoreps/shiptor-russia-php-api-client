<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Request;

use ShiptorRussiaApiClient\Client\Core\Request\GenericRequest,
    ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model\Tracking as TrackingResult;

class GetTracking extends GenericRequest{
    protected $name = "getTracking";
    protected function initFields(){
        $this->getFieldsCollection()
            ->String("query")->setRequired()->add();
    }
    public function query($value){
        return $this->setField("query", $value);
    }
    public function getResponseClassName() {
        return TrackingResult::class;
    }
}