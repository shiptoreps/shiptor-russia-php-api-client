<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Core\Fields\Custom;

class PackageProduct extends Custom
{
    protected function setFields()
    {
        $this->getFieldsCollection()
            ->String("shopArticle")->setRequired()->add()
            ->String("name")->add()
            ->Number("count")->setRequired()->add()
            ->Number("price")->setRequired()->add()
            ->Number("vat")->add()
            ->String("supplier_INN")->add()
            ->String("supplier_name")->add()
            ->String("supplier_phone")->add()
            ->String("mark_code")->add()
        ;
    }

    protected function checkSingleValue($value)
    {
        return is_array($value);
    }

    public function convertValue($value)
    {
        return (array)$value;
    }

    public function setShopArticle($shopArticle)
    {
        $this->getFieldsCollection()->get("shopArticle")->setValue($shopArticle);
        return $this;
    }

    public function setName($name)
    {
        $this->getFieldsCollection()->get("name")->setValue($name);
        return $this;
    }

    public function setCount($count)
    {
        $this->getFieldsCollection()->get("count")->setValue($count);
        return $this;
    }

    public function setPrice($price)
    {
        $this->getFieldsCollection()->get("price")->setValue($price);
        return $this;
    }

    public function setVat($vat)
    {
        $this->getFieldsCollection()->get("vat")->setValue($vat);
        return $this;
    }

    public function setSupplierInn($inn)
    {
        $this->getFieldsCollection()->get("supplier_INN")->setValue($inn);
        return $this;
    }

    public function setSupplierName($name)
    {
        $this->getFieldsCollection()->get("supplier_name")->setValue($name);
        return $this;
    }

    public function setSupplierPhone($phone)
    {
        $this->getFieldsCollection()->get("supplier_phone")->setValue($phone);
        return $this;
    }

    public function setMarkCode($code)
    {
        $this->getFieldsCollection()->get("mark_code")->setValue($code);
        return $this;
    }
}