<?php
namespace ShiptorRussiaApiClient\Client\Response\AddPackage;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;
use ShiptorRussiaApiClient\Client\Response\ShippingMethod\ShippingMethodResponse;

class DepartureResponse extends AbstractResponse
{
    /**
     * @var ShippingMethodResponse
     */
    private $shippingMethod;

    /**
     * @var AddressResponse
     */
    private $address;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->shippingMethod = new ShippingMethodResponse(array('result' => $this->data['shipping_method']));
        $this->address = new AddressResponse(array('result' => $this->data['address']));
    }

    /**
     * @return ShippingMethodResponse
     */
    public function getShippingMethod()
    {
        return $this->shippingMethod;
    }

    /**
     * @return AddressResponse
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getDeliveryPoint()
    {
        return $this->data['delivery_point'];
    }
}