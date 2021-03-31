<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Service extends ArrayCollection
{
    public function getName()
    {
        return $this->get("name");
    }

    public function getShopArticle()
    {
        return $this->get("shopArticle");
    }

    public function getCount()
    {
        return $this->get("count");
    }

    public function getPrice()
    {
        return $this->get("price");
    }

    public function getVat()
    {
        return $this->get("vat");
    }
}