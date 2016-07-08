<?php
namespace ShiptorRussiaApiClient\Client;

use ShiptorRussiaApiClient\Client\Handler\PackageHandler;

class Client
{
    protected $request;
    /**
     * @param string $apiKey
     * @param string $apiUrl
     */
    public function __construct($apiKey, $apiUrl = '')
    {
        $this->request = new Request($apiKey, $apiUrl);
    }
    /**
     * @return Request
     */
    protected function getRequest()
    {
        return $this->request;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return Response\SettlementsResponse
     */
    public function getSettlements($page = 1, $perPage = 100)
    {
        return new Response\SettlementsResponse($this->getRequest()->call('getSettlements', [
            'per_page' => $perPage,
            'page' => $page,
        ]));
    }

    /**
     * @return Response\ShippingMethodsResponse
     */
    public function getShippingMethods()
    {
        return new Response\ShippingMethodsResponse($this->getRequest()->call('getShippingMethods'));
    }

    /**
     * @return Response\DeliveryPointsResponse
     */
    public function getDeliveryPoints()
    {
        return new Response\DeliveryPointsResponse($this->getRequest()->call('getDeliveryPoints'));
    }

    /**
     * @param int    $length
     * @param int    $width
     * @param int    $height
     * @param int    $weight
     * @param int    $cod
     * @param int    $declaredCost
     * @param string $kladr
     * @return Response\CalculateShippingResponse
     * @throws Exception\EmptyDimensionsException
     * @throws Exception\EmptyWeightException
     * @throws Exception\CodAmountException
     * @throws Exception\EmptyApiKeyException
     */
    public function calculateShipping($length, $width, $height, $weight, $cod = 0, $declaredCost = 0, $kladr)
    {
        if (empty($length) || empty($width) || empty($height)) {
            throw new Exception\EmptyDimensionsException();
        }
        if (empty($weight)) {
            throw new Exception\EmptyWeightException();
        }
        if ($cod != 0 && $cod != $declaredCost) {
            throw new Exception\CodAmountException();
        }
        if (empty($kladr)) {
            throw new Exception\EmptyApiKeyException();
        }
        return new Response\CalculateShippingResponse($this->getRequest()->call('calculateShipping',[
            'length' => $length,
            'width' => $width,
            'height' => $height,
            'weight' => $weight,
            'cod' => $cod,
            'declared_cost' => $declaredCost,
            'kladr_id' => $kladr,
        ]));
    }

    /**
     * @param array $package
     * @return Response\AddPackageResponse
     */
    public function addPackage($package)
    {
        $packageHandler = new PackageHandler();
        $packageHandler->validate($package);
        $package = new Package($package);

        return new Response\AddPackageResponse($this->getRequest()->call('addPackage', $package->toArray()));
    }

    /**
     * @param $packageId
     * @return Response\CalculateShippingResponse
     * @throws Exception\EmptyPackageIdException
     */
    public function getPackage($packageId)
    {
        if (empty($packageId)) {
            throw new Exception\EmptyPackageIdException();
        }
        return new Response\GetPackageResponse($this->getRequest()->call('getPackage', [
            'id' => $packageId
        ]));
    }
}