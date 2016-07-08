<?php
namespace ShiptorRussiaApiClient\Client\Response\GetPackage;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;
use ShiptorRussiaApiClient\Client\Response\AddPackage\AddressResponse;
use ShiptorRussiaApiClient\Client\Response\DeliveryPoint\DeliveryPointResponse;
use ShiptorRussiaApiClient\Client\Response\ShippingMethod\ShippingMethodResponse;

class HistoryResponse extends AbstractResponse
{
    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return new \DateTime($this->data['date']);
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->data['event'];
    }
}