<?php
namespace ShiptorRussiaApiClient\Client;

class Address
{
    /**
     * @var array
     */
    protected $data;
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->data['country'];
    }

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
        return isset($this->data['patronymic']) ? $this->data['patronymic'] : null;
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
        return isset($this->data['administrative_area']) ? $this->data['administrative_area'] : null;
    }

    /**
     * @return string
     */
    public function getSettlement()
    {
        return isset($this->data['settlement']) ? $this->data['settlement'] : null;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return isset($this->data['address_line_1']) ? $this->data['address_line_1'] : null;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return isset($this->data['street']) ? $this->data['street'] : null;
    }

    /**
     * @return string
     */
    public function getHouse()
    {
        return isset($this->data['house']) ? $this->data['house'] : null;
    }

    /**
     * @return string
     */
    public function getApartment()
    {
        return isset($this->data['apartment']) ? $this->data['apartment'] : null;
    }

    /**
     * @return string
     */
    public function getKladr()
    {
        return isset($this->data['kladr_id']) ? $this->data['kladr_id'] : null;
    }
}