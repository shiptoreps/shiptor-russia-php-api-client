<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddShipment\Product as ShipmentProduct,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment as AddShipmentResult;

class AddShipment extends GenericShippingRequest{
    protected $name = "addShipment";
    protected function initFields() {
        $this->getFieldsCollection()
                ->Number("stock")->setRequired()->add()
                ->Custom("products",ShipmentProduct::class)->setRequired()->add();
    }
    public function setStock($stockId){
        return $this->setField('stock', $stockId);
    }
    public function newProduct(){
        return $this->getFieldsCollection()->get('products')->next();
    }
    public function getResponseClassName() {
        return AddShipmentResult::class;
    }
}