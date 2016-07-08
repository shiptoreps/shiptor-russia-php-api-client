<?php
namespace ShiptorRussiaApiClient\Client\Response\DeliveryPoint;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class GpsLocationResponse extends AbstractResponse
{
    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->data['latitude'];
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->data['longitude'];
    }
}