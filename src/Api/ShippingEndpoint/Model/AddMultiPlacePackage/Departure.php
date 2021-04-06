<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Departure\Address;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Departure\ShippingMethod;
use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Departure extends ArrayCollection
{
    private $shippingMethod;
    private $address;

    public function __construct($elements = [])
    {
        parent::__construct($elements);
        $this->shippingMethod = new ShippingMethod($this->get("shippingMethod"));
        $this->address = new Address($this->get("address"));
    }
}