<?php
namespace ShiptorRussiaApiClient\Client\Response;

use ShiptorRussiaApiClient\Client\Response\GetPackage\DepartureResponse;
use ShiptorRussiaApiClient\Client\Response\GetPackage\HistoryResponse;

class GetPackageResponse extends AbstractResponse
{
    /**
     * @var HistoryResponse[]
     */
    private $history;

    /**
     * @var DepartureResponse
     */
    private $departure;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->departure = new DepartureResponse(array('result' => $this->data['departure']));
        foreach ($this->data['history'] as $history) {
            $this->history[] = new HistoryResponse(array('result' => $history));
        }
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
     * @return numeric
     */
    public function getCod()
    {
        return $this->data['cod'];
    }

    /**
     * @return numeric
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

    /**
     * @return HistoryResponse[]
     */
    public function getHistory()
    {
        return $this->history;
    }
}

