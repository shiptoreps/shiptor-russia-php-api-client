<?php
namespace ShiptorRussiaApiClient\Client\Response;

use ShiptorRussiaApiClient\Client\Response\AddPackage\DepartureResponse;

class AddPackageResponse extends AbstractResponse
{
    /**
     * @var DepartureResponse
     */
    private $departure;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->departure = new DepartureResponse(array('result' => $this->data['departure']));
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->data['external_id'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->data['status'];
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
     * @return int
     */
    public function getCod()
    {
        return $this->data['cod'];
    }

    /**
     * @return int
     */
    public function getDeclaredCost()
    {
        return $this->data['declared_cost'];
    }

    /**
     * @return string
     */
    public function getLabelUrl()
    {
        return $this->data['label_url'];
    }

    /**
     * @return DepartureResponse
     */
    public function getDeparture()
    {
        return $this->departure;
    }
}

