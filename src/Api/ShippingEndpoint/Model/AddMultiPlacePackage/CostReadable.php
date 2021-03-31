<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class CostReadable extends ArrayCollection
{
    public function getService()
    {
        return $this->get("service");
    }

    public function getName()
    {
        return $this->get("name");
    }

    public function getSum()
    {
        return $this->get("sum");
    }

    public function getCurrency()
    {
        return $this->get("currency");
    }

    public function getReadable()
    {
        return $this->get("readable");
    }
}