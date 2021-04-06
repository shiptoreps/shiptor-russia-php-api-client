<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Cost extends ArrayCollection
{
    public function getShippingCost()
    {
        return $this->get("shipping_cost");
    }

    public function getCodServiceCost()
    {
        return $this->get("cod_service_cost");
    }

    public function getCompensationServiceCost()
    {
        return $this->get("compensation_service_cost");
    }

    public function getTotalCost()
    {
        return $this->get("total_cost");
    }
}