<?php
namespace ShiptorRussiaApiClient\Client\Response\GetPackage;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;
use ShiptorRussiaApiClient\Client\Response\AddPackage\AddressResponse;
use ShiptorRussiaApiClient\Client\Response\DeliveryPoint\DeliveryPointResponse;
use ShiptorRussiaApiClient\Client\Response\ShippingMethod\ShippingMethodResponse;

class DepartureResponse extends AbstractResponse
{
    /**
     * @var ShippingMethodResponse[]
     */
    private $shippingMethod;

    /**
     * @var AddressResponse
     */
    private $address;

    /**
     * @var DeliveryPointResponse
     */
    private $deliveryPoint;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->shippingMethod = new ShippingMethodResponse(array('result' => $this->data['shipping_method']));
        $this->address = new AddressResponse(array('result' => $this->data['address']));
        $this->deliveryPoint = new DeliveryPointResponse(array('result' => $this->data['delivery_point']));
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
     * @return DeliveryPointResponse
     */
    public function getDeliveryPoint()
    {
        return $this->deliveryPoint;
    }
}