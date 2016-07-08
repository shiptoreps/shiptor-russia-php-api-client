<?php
namespace ShiptorRussiaApiClient\Client\Response\CalculateShipping;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class TotalResponse extends AbstractResponse
{
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