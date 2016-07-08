<?php
namespace ShiptorRussiaApiClient\Client\Response\Settlement;

use ShiptorRussiaApiClient\Client\Response\AbstractResponse;

class ParentResponse extends AbstractResponse
{
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
}