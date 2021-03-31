<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Cost;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\CostReadable;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Departure;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Product as ProductModel;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage\Service as ServiceModel;
use ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection;
use ShiptorRussiaApiClient\Client\Core\Model\Result;

class AddMultiPlacePackage extends Result
{
    protected $cost;
    protected $departure;
    protected $products;
    protected $services;
    protected $costReadable;

    protected function init()
    {
        $this->cost = new Cost($this->get("cost"));
        $this->departure = new Departure($this->get("departure"));
        $this->products = new GenericCollection($this->get("products"), ProductModel::class);
        $this->services = new GenericCollection($this->get("services"), ServiceModel::class);
        $this->costReadable = new GenericCollection($this->get("cost_readable"), CostReadable::class);
    }

    public function getId()
    {
        return $this->get("id");
    }

    public function getExternalId()
    {
        return $this->get("external_id");
    }

    public function getStock()
    {
        return $this->get("stock");
    }

    public function getStatus()
    {
        return $this->get("status");
    }

    public function getCurrentStatus()
    {
        return $this->get("current_status");
    }

    public function getTrackingNumber()
    {
        return $this->get("tracking_number");
    }

    public function getExternalTrackingNumber()
    {
        return $this->get("external_tracking_number");
    }

    public function getCreatedAt()
    {
        return $this->get("created_at");
    }

    public function getWeight()
    {
        return $this->get("weight");
    }

    public function getLength()
    {
        return $this->get("length");
    }

    public function getWidth()
    {
        return $this->get("width");
    }

    public function getHeight()
    {
        return $this->get("height");
    }

    public function getCod()
    {
        return $this->get("cod");
    }

    public function getDeclaredCost()
    {
        return $this->get("declared_cost");
    }

    public function getNoGather()
    {
        return $this->get("no_gather");
    }

    public function getLabelUrl()
    {
        return $this->get("label_url");
    }

    public function getSmallLabelUrl()
    {
        return $this->get("small_label_url");
    }

    public function getSberbankPaymentQrUrl()
    {
        return $this->get("sberbank_payment_qr_url");
    }

    public function getPostamatLoadCode()
    {
        return $this->get("postamat_load_code");
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getDeparture()
    {
        return $this->departure;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getPickUp()
    {
        return $this->get("pick_up");
    }

    public function getCheckpoints()
    {
        return $this->get("checkpoints");
    }

    public function getHistory()
    {
        return $this->get("history");
    }

    public function getOrders()
    {
        return $this->get("orders");
    }

    public function getType()
    {
        return $this->get("type");
    }

    public function getMethod()
    {
        return $this->get("method");
    }

    public function getArchivedAt()
    {
        return $this->get("archived_at");
    }

    public function getPaid()
    {
        return $this->get("paid");
    }

    public function getPhoto()
    {
        return $this->get("photo");
    }

    public function getServices()
    {
        return $this->services;
    }

    public function getDeliveryTime()
    {
        return $this->get("delivery_time");
    }

    public function getDelayedDeliveryAt()
    {
        return $this->get("delayed_delivery_at");
    }

    public function getCostReadable()
    {
        return $this->costReadable;
    }
}