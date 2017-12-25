<?php
namespace ShiptorRussiaApiClient\Client\Api;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddPackage,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddCourierPackages,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddDeliveryPointPackages,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddPickup,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddProduct,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddProvider,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddService,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddShipment,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\AddWarehouse,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\CalculateShipping,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\CalculateShippingInternational,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\CancelPickup,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\DeletePackage,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\DeleteProduct,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\DeleteProvider,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\DeleteService,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\DeleteShipment,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\DeleteWarehouse,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetCountries,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetDeliveryPoints,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetDeliveryTime,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetPackage,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetPackages,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetPackagesCount,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetPickup,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetPickupTime,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetServices,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetSettlements,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetShipment,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetShipments,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetShippingMethods,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetWarehouse,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GetWarehouses,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\SearchPackages,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\SuggestSettlement;

class ShippingEndpoint{
    private $addCourierPackages;
    private $addDeliveryPointPackages;
    private $addPackage;
    private $addPickup;
    private $addProduct;
    private $addProvider;
    private $addService;
    private $addShipment;
    private $addWarehouse;
    private $calculateShipping;
    private $calculateShippingInternational;
    private $cancelPickup;
    private $deletePackage;
    private $deleteProduct;
    private $deleteProvider;
    private $deleteService;
    private $deleteShipment;
    private $deleteWarehouse;
    private $getPackage;
    private $getPackages;
    private $getPackagesCount;
    private $getPickup;
    private $getPickupTime;
    private $getServices;
    private $getSettlements;
    private $getShipment;
    private $getShipments;
    private $getShippingMethods;
    private $getCountries;
    private $getDeliveryPoints;
    private $getDeliveryTime;
    private $getWarehouse;
    private $getWarehouses;
    private $searchPackages;
    private $suggestSettlement;
    public function addPackage(){
        return $this->addPackage = new AddPackage();
    }
    public function addCourierPackages(){
        return $this->addCourierPackages = new AddCourierPackages();
    }
    public function addDeliveryPointPackages(){
        return $this->addDeliveryPointPackages = new AddDeliveryPointPackages();
    }
    public function addPickup(){
        return $this->addPickup = new AddPickup();
    }
    public function addProduct(){
        return $this->addProduct = new AddProduct();
    }
    public function addProvider(){
        return $this->addProvider = new AddProvider();
    }
    public function addService(){
        return $this->addService = new AddService();
    }
    public function addShipment(){
        return $this->addShipment = new AddShipment();
    }
    public function addWarehouse(){
        return $this->addWarehouse = new AddWarehouse();
    }
    public function calculateShipping() {
        return $this->calculateShipping = new CalculateShipping();
    }
    public function calculateShippingInternational(){
        return $this->calculateShippingInternational = new CalculateShippingInternational();
    }
    public function cancelPickup($id = null){
        $this->cancelPickup = new CancelPickup();
        if(!empty($id)){
            $this->cancelPickup->setId($id);
        }
        return $this->cancelPickup;
    }
    public function deletePackage($externalId = null){
        $this->deletePackage = new DeletePackage();
        if(!empty($externalId)){
            $this->deletePackage->setExternalId($externalId);
        }
        return $this->deletePackage;
    }
    public function deleteProduct($shopArticle = null){
        $this->deleteProduct = new DeleteProduct();
        if(!empty($shopArticle)){
            $this->deleteProduct->setShopArticle($shopArticle);
        }
        return $this->deleteProduct;
    }
    public function deleteProvider($id = null){
        $this->deleteProvider = new DeleteProvider();
        if(!empty($id)){
            $this->deleteProvider->setId($id);
        }
        return $this->deleteProvider;
    }
    public function deleteService($shopArticle = null){
        $this->deleteService = new DeleteService();
        if(!empty($shopArticle)){
            $this->deleteService->setShopArticle($shopArticle);
        }
        return $this->deleteService;
    }
    public function deleteShipment($id = null){
        $this->deleteShipment = new DeleteShipment();
        if(!empty($id)){
            $this->deleteShipment->setId($id);
        }
        return $this->deleteShipment;
    }
    public function deleteWarehouse($id = null){
        $this->deleteWarehouse = new DeleteWarehouse();
        if(!empty($id)){
            $this->deleteWarehouse->setId($id);
        }
        return $this->deleteWarehouse;
    }
    public function getCountries(){
        return $this->getCountries = new GetCountries();
    }
    public function getDeliveryPoints(){
        return $this->getDeliveryPoints = new GetDeliveryPoints();
    }
    public function getDeliveryTime(){
        return $this->getDeliveryTime = new GetDeliveryTime();
    }
    public function getPackage($externalId = null){
        $this->getPackage = new GetPackage();
        if(!empty($externalId)){
            $this->getPackage->setExternalId($externalId);
        }
        return $this->getPackage;
    }
    public function getPackages(){
        return $this->getPackages = new GetPackages();
    }
    public function getPackagesCount(){
        return $this->getPackagesCount = new GetPackagesCount();
    }
    public function getPickUp($id = null){
        $this->getPickup = new GetPickup();
        if(!empty($id)){
            $this->getPickup->setId($id);
        }
        return $this->getPickup;
    }
    public function getPickupTime(){
        return $this->getPickupTime = new GetPickupTime();
    }
    public function getSettlements(){
        return $this->getSettlements = new GetSettlements();
    }
    public function getServices(){
        return $this->getServices = new GetServices();
    }
    public function getShipments(){
        return $this->getShipments = new GetShipments();
    }
    public function getShipment($shipmentId = null){
        $this->getShipment = new GetShipment();
        if(!empty($shipmentId)){
            $this->getShipment->setId($shipmentId);
        }
        return $this->getShipment;
    }
    public function getShippingMethods(){
        return $this->getShippingMethods = new GetShippingMethods();
    }
    public function getWarehouse($warehouseId = null){
        $this->getWarehouse = new GetWarehouse();
        if(!empty($warehouseId)){
            $this->getWarehouse->setId($warehouseId);
        }
        return $this->getWarehouse;
    }
    public function getWarehouses(){
        return $this->getWarehouses = new GetWarehouses();
    }
    public function searchPackages(){
        return $this->searchPackages = new SearchPackages();
    }
    public function suggestSettlement(){
        return $this->suggestSettlement = new SuggestSettlement();
    }
}