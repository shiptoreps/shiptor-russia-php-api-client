<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Departure;

use ShiptorRussiaApiClient\Client\Core\Collection\ArrayCollection;

class Address extends ArrayCollection
{
    public function getReceiver()
    {
        return $this->get("receiver");
    }

    public function getEmail()
    {
        return $this->get("email");
    }

    public function getPhone()
    {
        return $this->get("phone");
    }

    public function getCountryCode()
    {
        return $this->get("country_code");
    }

    public function getAdministrativeArea()
    {
        return $this->get("administrative_area");
    }

    public function getSettlement()
    {
        return $this->get("settlement");
    }

    public function getAddressLine()
    {
        return $this->get("address_line_1");
    }

    public function getMarkedAsTrashAt()
    {
        return $this->get("marked_as_trash_at");
    }

    public function getTimezone()
    {
        return $this->get("timezone");
    }

    public function getName()
    {
        return $this->get("name");
    }

    public function getSurname()
    {
        return $this->get("surname");
    }

    public function getPatronymic()
    {
        return $this->get("patronymic");
    }

    public function getPostalCode()
    {
        return $this->get("postal_code");
    }

    public function getStreet()
    {
        return $this->get("street");
    }

    public function getHouse()
    {
        return $this->get("house");
    }

    public function getApartment()
    {
        return $this->get("apartment");
    }

    public function getKladrId()
    {
        return $this->get("kladr_id");
    }
}