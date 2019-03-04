<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

class EditPackageExport extends AddPackageExport{
    protected $name = "editPackage";
    protected function initFields(){
        $this->getFieldsCollection()->Number('id')->setRequired()->add();
        parent::initFields();
    }
    public function setId($packageId){
        return $this->setField('id',$packageId);
    }
}