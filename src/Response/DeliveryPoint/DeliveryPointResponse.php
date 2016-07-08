<?php
namespace ShiptorRussiaApiClient\Client\Response\DeliveryPoint;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class DeliveryPointResponse extends AbstractResponse
{
    /**
     * @var GpsLocationResponse
     */
    private $gpsLocation;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->gpsLocation = new GpsLocationResponse(array('result' => $this->data['gps_location']));
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string
     */
    public function getCourier()
    {
        return $this->data['courier'];
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->data['address'];
    }

    /**
     * @return array
     */
    public function getParents()
    {
        return $this->data['phones'];
    }

    /**
     * @return string
     */
    public function getTripDescription()
    {
        return $this->data['trip_description'];
    }

    /**
     * @return string
     */
    public function getWorkSchedule()
    {
        return $this->data['work_schedule'];
    }

    /**
     * @return string
     */
    public function getShippingDays()
    {
        return $this->data['shipping_days'];
    }

    /**
     * @return GpsLocationResponse
     */
    public function getGpsLocation()
    {
        return $this->gpsLocation;
    }

    /**
     * @return string
     */
    public function getKladr()
    {
        return $this->data['kladr_id'];
    }

    /**
     * @return array
     */
    public function getShippingMethods()
    {
        return $this->data['shipping_methods'];
    }
}