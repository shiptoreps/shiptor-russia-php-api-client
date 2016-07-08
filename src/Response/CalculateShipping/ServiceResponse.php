<?php
namespace ShiptorRussiaApiClient\Client\Response\CalculateShipping;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class ServiceResponse extends AbstractResponse
{
    /**
     * @return string
     */
    public function getService()
    {
        return $this->data['service'];
    }

    /**
     * @return int
     */
    public function getSum()
    {
        return $this->data['sum'];
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->data['currency'];
    }

    /**
     * @return string
     */
    public function getReadable()
    {
        return $this->data['readable'];
    }
}