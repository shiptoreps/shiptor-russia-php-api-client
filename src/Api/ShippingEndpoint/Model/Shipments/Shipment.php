<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipments;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Shipment as AddShipmentResult;

class Shipment extends AddShipmentResult{
    public function getId(){
        return $this->get("id");
    }
}