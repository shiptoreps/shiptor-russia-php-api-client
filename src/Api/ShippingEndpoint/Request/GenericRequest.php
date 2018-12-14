<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Client as ShippingClient,
    ShiptorRussiaApiClient\Client\Core\Request\GenericRequest as PublicGenericRequest;

abstract class GenericRequest extends PublicGenericRequest{
    protected function getClient(){
        return ShippingClient::getInstance();
    }
    public function getAvailableAdditionalServices(){
        return array(self::AS_EXPRESS_GATHERING, self::AS_PARTIAL_PAYOUT, self::AS_ADDITIONAL_PACK);
    }
    const AS_EXPRESS_GATHERING = 'express-gathering';
    const AS_PARTIAL_PAYOUT = 'partial-pay-out';
    const AS_ADDITIONAL_PACK = 'additional-pack';
}