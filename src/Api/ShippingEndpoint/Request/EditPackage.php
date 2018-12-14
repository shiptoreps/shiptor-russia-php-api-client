<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

class EditPackage extends AddPackage{
    protected $name = "editPackage";
    protected function initFields(){
        $this->getFieldsCollection()->Number('id')->setRequired()->add();
        parent::initFields();
        $this->getFieldsCollection()->remove('stock');
    }
    public function setId($packageId){
        return $this->setField('id',$packageId);
    }
}