<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Departure;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class ShippingMethod extends ArrayCollection
{
    public function getId()
    {
        return $this->get("id");
    }

    public function getName()
    {
        return $this->get("name");
    }

    public function getCategory()
    {
        return $this->get("category");
    }

    public function getGroup()
    {
        return $this->get("group");
    }

    public function getCourier()
    {
        return $this->get("courier");
    }

    public function getCourierCode()
    {
        return $this->get("courier_code");
    }

    public function getComment()
    {
        return $this->get("comment");
    }

    public function getDescription()
    {
        return $this->get("description");
    }

    public function getHelpUrl()
    {
        return $this->get("help_url");
    }

    public function getConstraints()
    {
        return $this->get("constraints");
    }
}