<?php
namespace ShiptorRussiaApiClient\Client\Response\AddPackage;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class AddressResponse extends AbstractResponse
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->data['surname'];
    }

    /**
     * @return string
     */
    public function getPatronymic()
    {
        return $this->data['patronymic'];
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->data['phone'];
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->data['postal_code'];
    }

    /**
     * @return string
     */
    public function getAdministrativeArea()
    {
        return $this->data['administrative_area'];
    }

    /**
     * @return string
     */
    public function getSettlement()
    {
        return $this->data['settlement'];
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->data['street'];
    }

    /**
     * @return string
     */
    public function getHouse()
    {
        return $this->data['house'];
    }

    /**
     * @return string
     */
    public function getApartment()
    {
        return $this->data['apartment'];
    }

    /**
     * @return string
     */
    public function getKladr()
    {
        return $this->data['kladr_id'];
    }
}