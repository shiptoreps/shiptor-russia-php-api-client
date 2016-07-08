<?php
namespace ShiptorRussiaApiClient\Client\Response;

use ShiptorRussiaApiClient\Client\Response\DeliveryPoint\DeliveryPointResponse;

class DeliveryPointsResponse extends AbstractResponse
{
    /**
     * @var DeliveryPointResponse[]
     */
    private $deliveryPoints;
    public function __construct($data)
    {
        parent::__construct($data);
        foreach ($this->data as $deliveryPoint) {
            $this->deliveryPoints[] = new DeliveryPointResponse(array('result' => $deliveryPoint));
        }
    }
    /**
     * @return DeliveryPointResponse[]
     */
    public function getDeliveryPoints()
    {
        return $this->deliveryPoints;
    }
}

