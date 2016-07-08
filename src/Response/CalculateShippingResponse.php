<?php
namespace ShiptorRussiaApiClient\Client\Response;

use ShiptorRussiaApiClient\Client\Response\CalculateShipping\MethodListResponse;
use ShiptorRussiaApiClient\Client\Response\CalculateShipping\RequestCalculateShippingResponse;

class CalculateShippingResponse extends AbstractResponse
{
    /**
     * @var MethodListResponse[]
     */
    private $methods;

    /**
     * @var RequestCalculateShippingResponse
     */
    private $request;

    public function __construct($data)
    {
        parent::__construct($data);
        $this->request = new RequestCalculateShippingResponse(array('result' => $this->data['request']));
        foreach ($this->data['methods'] as $method) {
            $this->methods[] = new MethodListResponse(array('result' => $method));
        }
    }

    /**
     * @return RequestCalculateShippingResponse
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return MethodListResponse[]
     */
    public function getMethods()
    {
        return $this->methods;
    }
}

