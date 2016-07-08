<?php
namespace ShiptorRussiaApiClient\Client\Response\ShippingMethod;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class ShippingMethodResponse extends AbstractResponse
{
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
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->data['category'];
    }

    /**
     * @return string
     */
    public function getCourier()
    {
        return $this->data['courier'];
    }
}