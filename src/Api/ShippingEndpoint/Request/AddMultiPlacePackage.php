<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddMultiPlacePackage\Package;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddMultiPlacePackage\Product;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddMultiPlacePackage\Service;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\AddMultiPlacePackage as AddMultiPlacePackageResult;
use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest;

class AddMultiPlacePackage extends GenericShippingRequest
{
    protected $name = "addMultiPlacePackage";

    protected function initFields()
    {
        $this->getFieldsCollection()
            ->Number("cod")->setRequired()->add()
            ->Number("declared_cost")->setRequired()->add()
            ->Number("stock")->add()
            ->String("external_id")->add()
            ->Custom("services", Service::class)->setMulty()->setRequired()->add()
            ->Custom("products", Product::class)->setMulty()->setRequired()->add()
            ->String("photos")->setMulty()->add()
            ->String("attachment")->add()
            ->Collection("departure")
                ->Number("shipping_method")->setRequired()->add()
                ->Number("delivery_point")->add()
                ->Number("delivery_time")->add()
                ->String("delivery_time_string")->add()
                ->String("delayed_delivery_at")->add()
                ->Boolean("cashless_payment")->add()
                ->String("comment")->add()
                ->Collection("address")
                    ->Enum("country")->setOptions($this->getAvailableCountries())->setRequired()->add()
                    ->String("name")->setRequired()->add()
                    ->String("surname")->setRequired()->add()
                    ->String("patronymic")->add()
                    ->String("receiver")->setRequired()->add()
                    ->String("email")->setRequired()->add()
                    ->String("phone")->setRequired()->add()
                    ->String("postal_code")->add()
                    ->String("administrative_area")->add()
                    ->String("settlement")->add()
                    ->String("street")->add()
                    ->String("house")->add()
                    ->String("apartment")->add()
                    ->String("address_line_1")->add()
                    ->String("kladr_id")->add()
                ->endCollection()
            ->endCollection()
            ->Custom("packages", Package::class)->setMulty()->setRequired()->add()
        ;
    }

    public function validate()
    {
        if (!empty($this->getAddress()->get("receiver")->getValue())) {
            $this->getAddress()->get("name")->unsetRequired();
            $this->getAddress()->get("surname")->unsetRequired();
        }

        if (empty($this->getDeparture()->get('delivery_point')->getValue())) {
            $street = $this->getAddress()->get('street')->getValue();
            $house = $this->getAddress()->get('house')->getValue();
            if (empty($street) && empty($house)) {
                $this->getAddress()->get('address_line_1')->setRequired();
            } else {
                if (empty($street) || empty($house)) {
                    $this->getAddress()->get('street')->setRequired();
                    $this->getAddress()->get('house')->setRequired();
                }
            }
        }

        parent::validate();
    }

    public function getResponseClassName()
    {
        return AddMultiPlacePackageResult::class;
    }

    public function setCod($cod)
    {
        $this->getFieldsCollection()->get("cod")->setValue($cod);
        return $this;
    }

    public function setDeclaredCost($cost)
    {
        $this->getFieldsCollection()->get("declared_cost")->setValue($cost);
        return $this;
    }

    public function setStock($stock)
    {
        $this->getFieldsCollection()->get("stock")->setValue($stock);
        return $this;
    }

    public function setExternalId($externalId)
    {
        $this->getFieldsCollection()->get("external_id")->setValue($externalId);
        return $this;
    }

    /**
     * @return Service
     */
    public function newService()
    {
        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        return $this->getFieldsCollection()->get("services")->_new();
    }

    /**
     * @return Product
     */
    public function newProduct()
    {
        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        return $this->getFieldsCollection()->get("products")->_new();
    }

    public function setAttachment($attachment)
    {
        $this->getFieldsCollection()->get("attachment")->setValue($attachment);
        return $this;
    }

    public function getDeparture()
    {
        return $this->getFieldsCollection()->get("departure");
    }

    public function setShippingMethod($shippingMethod)
    {
        $this->getDeparture()->get("shipping_method")->setValue($shippingMethod);
        return $this;
    }

    public function setDeliveryPoint($deliveryPoint)
    {
        $this->getDeparture()->get("delivery_point")->setValue($deliveryPoint);
        return $this;
    }

    public function setDeliveryTime($deliveryTime)
    {
        $this->getDeparture()->get("delivery_time")->setValue($deliveryTime);
        return $this;
    }

    public function setDeliveryTimeString($deliveryTimeString)
    {
        $this->getDeparture()->get("delivery_time_string")->setValue($deliveryTimeString);
        return $this;
    }

    public function setDelayedDeliveryAt($delayedDeliveryAt)
    {
        $this->getDeparture()->get("delayed_delivery_at")->setValue($delayedDeliveryAt);
        return $this;
    }

    public function setCashlessPayment($cashlessPayment)
    {
        $this->getDeparture()->get("cashless_payment")->setValue($cashlessPayment);
        return $this;
    }

    public function setComment($comment)
    {
        $this->getDeparture()->get("comment")->setValue($comment);
        return $this;
    }

    public function getAddress()
    {
        return $this->getDeparture()->get("address");
    }

    public function setCountry($country)
    {
        $this->getAddress()->get("country")->setValue($country);
        return $this;
    }

    public function setName($name)
    {
        $this->getAddress()->get("name")->setValue($name);
        return $this;
    }

    public function setSurname($surname)
    {
        $this->getAddress()->get("surname")->setValue($surname);
        return $this;
    }

    public function setPatronymic($patronymic)
    {
        $this->getAddress()->get("patronymic")->setValue($patronymic);
        return $this;
    }

    public function setReceiver($receiver)
    {
        $this->getAddress()->get("receiver")->setValue($receiver);
        return $this;
    }

    public function setEmail($email)
    {
        $this->getAddress()->get("email")->setValue($email);
        return $this;
    }

    public function setPhone($phone)
    {
        $this->getAddress()->get("phone")->setValue($phone);
        return $this;
    }

    public function setPostalCode($postalCode)
    {
        $this->getAddress()->get("postal_code")->setValue($postalCode);
        return $this;
    }

    public function setAdministrativeArea($administrativeArea)
    {
        $this->getAddress()->get("administrative_area")->setValue($administrativeArea);
        return $this;
    }

    public function setSettlement($settlement)
    {
        $this->getAddress()->get("settlement")->setValue($settlement);
        return $this;
    }

    public function setStreet($street)
    {
        $this->getAddress()->get("street")->setValue($street);
        return $this;
    }

    public function setHouse($house)
    {
        $this->getAddress()->get("house")->setValue($house);
        return $this;
    }

    public function setApartment($apartment)
    {
        $this->getAddress()->get("apartment")->setValue($apartment);
        return $this;
    }

    public function setAddressLine($addressLine)
    {
        $this->getAddress()->get("address_line_1")->setValue($addressLine);
        return $this;
    }

    public function setKladrId($kladrId)
    {
        $this->getAddress()->get("kladr_id")->setValue($kladrId);
        return $this;
    }

    /**
     * @return Package
     */
    public function newPackage()
    {
        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        return $this->getFieldsCollection()->get("packages")->_new();
    }
}