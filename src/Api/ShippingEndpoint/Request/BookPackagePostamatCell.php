<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Package\PostamatCell as BookPackagePostamatCellResult;

class BookPackagePostamatCell extends GenericShippingRequest{
    protected $name = "bookPackagePostamatCell";
    protected function initFields() {
        $this->getFieldsCollection()
                ->Number("id")->setRequired()->add();
    }
    public function setPackageId($packageId){
        return $this->setField('id', $packageId);
    }
    public function getResponseClassName() {
        return BookPackagePostamatCellResult::class;
    }
}