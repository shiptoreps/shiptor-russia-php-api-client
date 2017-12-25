<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage\Photo as PackagePhoto,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage\Product as PackageProduct,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage\History as PackageHistory,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage\Departure as PackageDeparture,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddPackage\Service as PackageService,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection;

class AddPackage extends Result{
    protected $photo;
    protected $departure;
    protected $products;
    protected $services;
    protected $history;
    protected function init(){
        $this->setPhotos();
        $this->setDeparture();
        $this->setProducts();
        $this->setServices();
        $this->setHistory();
    }
    protected function setPhotos(){
        $this->photo = new GenericCollection($this->get("photo"), PackagePhoto::class);
    }
    protected function setDeparture(){
        $this->departure = new PackageDeparture($this->get('departure'));
    }
    protected function setProducts(){
        $this->products = new GenericCollection($this->get("products"), PackageProduct::class);
    }
    protected function setServices(){
        $this->services = new GenericCollection($this->get("services"), PackageService::class);
    }
    protected function setHistory(){
        $this->history = new GenericCollection($this->get("history"), PackageHistory::class);
    }
    public function getPhotos(){
        return $this->photo;
    }
    public function hasPhotos(){
        return $this->hasValue("photo");
    }
    public function getDeparture(){
        return $this->departure;
    }
    public function getProducts(){
        return $this->products;
    }
    public function getHistory(){
        return $this->history;
    }
    public function hasHistory(){
        return $this->hasValue("history");
    }
    public function getServices(){
        return $this->services;
    }
    public function hasServices(){
        return $this->hasValue("services");
    }
    public function getId(){
        return $this->get("id");
    }
    public function getExternalId(){
        return $this->get("external_id");
    }
    public function getTrackingNumber(){
        return $this->get("tracking_number");
    }
    public function getExternalTrackingNumber(){
        return $this->get("external_tracking_number");
    }
    public function getCreateDate(){
        return $this->get("created_at");
    }
    public function getStatus(){
        return $this->get("status");
    }
    public function getWeight(){
        return $this->get("weight");
    }
    public function getLength(){
        return $this->get("length");
    }
    public function getWidth(){
        return $this->get("width");
    }
    public function getHeight(){
        return $this->get("height");
    }
    public function getCod(){
        return $this->get("cod");
    }
    public function getDeclaredCost(){
        return $this->get("declared_cost");
    }
    public function getDeliveryTime(){
        return $this->get("delivery_time");
    }
    public function getDelayedDeliveryAt(){
        return $this->get("delayed_delivery_at");
    }
    public function getLabel(){
        return $this->get("label_url");
    }
    public function getPickup(){
        return $this->get("pick_up");
    }
}