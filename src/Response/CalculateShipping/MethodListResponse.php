<?php
namespace ShiptorRussiaApiClient\Client\Response\CalculateShipping;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class MethodListResponse extends AbstractResponse
{
    /**
     * @var MethodResponse[]
     */
    private $method;

    /**
     * @var CostResponse
     */
    private $cost;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->method = new MethodResponse(array('result' => $this->data['method']));
        $this->cost = new CostResponse(array('result' => $this->data['cost']));
    }

    /**
     * @return MethodResponse
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return CostResponse
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return string
     */
    public function getDays()
    {
        return $this->data['days'];
    }
}