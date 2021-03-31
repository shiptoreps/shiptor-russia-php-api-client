<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Product extends ArrayCollection
{
    public function getName()
    {
        return $this->get("name");
    }

    public function getShopArticle()
    {
        return $this->get("shopArticle");
    }

    public function getEnglishName()
    {
        return $this->get("englishName");
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

    public function getMarkCode()
    {
        return $this->get("mark_code");
    }
}