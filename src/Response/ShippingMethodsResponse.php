<?php
namespace ShiptorRussiaApiClient\Client\Response;

use ShiptorRussiaApiClient\Client\Response\ShippingMethod\ShippingMethodResponse;

class ShippingMethodsResponse extends AbstractResponse
{
    /**
     * @var ShippingMethodResponse[]
     */
    private $shippingMethods;

    public function __construct($data)
    {
        parent::__construct($data);
        foreach ($this->data as $shippingMethod) {
            $this->shippingMethods[] = new ShippingMethodResponse(array('result' => $shippingMethod));
        }
    }

    /**
     * @return ShippingMethodResponse[]
     */
    public function getShippingMethods()
    {
        return $this->shippingMethods;
    }
}

