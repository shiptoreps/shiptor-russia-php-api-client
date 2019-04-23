<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient,
    ShiptorRussiaApiClient\Client\Core\Request;

abstract class GenericRequest extends Request\GenericRequest{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
    public function getAvailableAdditionalServices(){
        return array(self::AS_EXPRESS_GATHERING, self::AS_ADDITIONAL_PACK);
    }
    const AS_EXPRESS_GATHERING = 'express-gathering';
    //const AS_PARTIAL_PAYOUT = 'partial-pay-out';
    const AS_ADDITIONAL_PACK = 'additional-pack';
    const AS_PACKAGE_INSURANCE = 'package-insurance';
}