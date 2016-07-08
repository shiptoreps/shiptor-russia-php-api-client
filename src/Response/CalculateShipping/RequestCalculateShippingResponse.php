<?php
namespace ShiptorRussiaApiClient\Client\Response\CalculateShipping;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class RequestCalculateShippingResponse extends AbstractResponse
{
    /**
     * @return int
     */
    public function getLength()
    {
        return $this->data['length'];
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->data['width'];
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->data['height'];
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->data['weight'];
    }

    /**
     * @return int
     */
    public function getCod()
    {
        return $this->data['cod'];
    }

    /**
     * @return int
     */
    public function getDeclaredCost()
    {
        return $this->data['declared_cost'];
    }

    /**
     * @return string
     */
    public function getKladr()
    {
        return $this->data['kladr_id'];
    }
}