<?php
namespace ShiptorRussiaApiClient\Client;

class Package
{
    /**
     * @var array
     */
    protected $data;

    protected $departure;
    public function __construct($data) {
        $this->data = $data;
        $this->departure = new Departure($this->data['departure']);
    }
    /**
     * @return int
     */
    public function getLength()
    {
        return $this->data['length'];
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->data['width'];
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->data['height'];
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->data['weight'];
    }

    /**
     * @return numeric
     */
    public function getCod()
    {
        return isset($this->data['cod']) ? $this->data['cod'] : 0;
    }

    /**
     * @return numeric
     */
    public function getDeclaredCost()
    {
        return isset($this->data['declared_cost']) ? $this->data['declared_cost'] : 0;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return isset($this->data['external_id']) ? $this->data['external_id'] : null;
    }

    /**
     * @return Departure
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    public function toArray() {
        return [
            'length' => $this->getLength(),
            'width' => $this->getLength(),
            'height' => $this->getHeight(),
            'weight' => $this->getWeight(),
            'cod' => $this->getCod(),
            'declared_cost' => $this->getDeclaredCost(),
            'external_id' => $this->getExternalId(),
            'departure' => [
                'shipping_method' => $this->getDeparture()->getShippingMethod(),
                'delivery_point' => $this->getDeparture()->getDeliveryPoint(),
                'address' => [
                    'country' => $this->getDeparture()->getAddress()->getCountry(),
                    'name' => $this->getDeparture()->getAddress()->getName(),
                    'surname' => $this->getDeparture()->getAddress()->getSurname(),
                    'patronymic' => $this->getDeparture()->getAddress()->getPatronymic(),
                    'email' => $this->getDeparture()->getAddress()->getEmail(),
                    'phone' => $this->getDeparture()->getAddress()->getPhone(),
                    'postal_code' => $this->getDeparture()->getAddress()->getPostalCode(),
                    'administrative_area' => $this->getDeparture()->getAddress()->getAdministrativeArea(),
                    'settlement' => $this->getDeparture()->getAddress()->getSettlement(),
                    'street' => $this->getDeparture()->getAddress()->getStreet(),
                    'house' => $this->getDeparture()->getAddress()->getHouse(),
                    'apartment' => $this->getDeparture()->getAddress()->getApartment(),
                    'kladr_id' => $this->getDeparture()->getAddress()->getKladr(),
                ],
            ],
        ];
    }
}