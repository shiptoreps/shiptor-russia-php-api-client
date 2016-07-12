<?php
namespace ShiptorRussiaApiClient\Client;

class Departure
{
    /**
     * @var array
     */
    protected $data;
    /**
     * @var Address
     */
    protected $address;
    public function __construct($data) {
        $this->data = $data;
        $this->address = new Address($this->data['address']);
    }
    /**
     * @return int
     */
    public function getShippingMethod()
    {
        return $this->data['shipping_method'];
    }

    /**
     * @return int|null
     */
    public function getDeliveryPoint()
    {
        return isset($this->data['delivery_point']) ? $this->data['delivery_point'] : null;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}