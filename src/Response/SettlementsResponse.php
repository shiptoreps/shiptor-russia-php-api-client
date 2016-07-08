<?php
namespace ShiptorRussiaApiClient\Client\Response;

use ShiptorRussiaApiClient\Client\Response\Settlement\SettlementResponse;

class SettlementsResponse extends AbstractResponse
{
    /**
     * @var SettlementResponse[]
     */
    private $settlements;
    public function __construct($data)
    {
        parent::__construct($data);
        foreach ($this->data as $settlement) {
            $this->settlements[] = new SettlementResponse(array('result' => $settlement));
        }
    }

    /**
     * @return SettlementResponse[]
     */
    public function getSettlements()
    {
        return $this->settlements;
    }
}

