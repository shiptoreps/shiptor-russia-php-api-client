<?php
namespace ShiptorRussiaApiClient\Client\Response\Settlement;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class SettlementResponse extends AbstractResponse
{
    /**
     * @var ParentResponse[]
     */
    private $parents;

    public function __construct($data)
    {
        parent::__construct($data);
        foreach ($this->data['parents'] as $parent) {
            $this->parents[] = new ParentResponse(array('result' => $parent));
        }
    }

    /**
     * @return string
     */
    public function getKladr()
    {
        return $this->data['kladr_id'];
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
    public function getType()
    {
        return $this->data['type'];
    }

    /**
     * @return string
     */
    public function getTypeShort()
    {
        return $this->data['type_short'];
    }

    /**
     * @return ParentResponse[]
     */
    public function getParents()
    {
        return $this->parents;
    }
}