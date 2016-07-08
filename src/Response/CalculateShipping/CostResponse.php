<?php
namespace ShiptorRussiaApiClient\Client\Response\CalculateShipping;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class CostResponse extends AbstractResponse
{
    /**
     * @var ServiceResponse[]
     */
    private $services;

    /**
     * @var TotalResponse
     */
    private $total;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->total = new TotalResponse(array('result' => $this->data['total']));
        foreach ($this->data['services'] as $service) {
            $this->services[] = new ServiceResponse(array('result' => $service));
        }
    }

    /**
     * @return ServiceResponse[]
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @return TotalResponse
     */
    public function getTotal()
    {
        return $this->total;
    }
}