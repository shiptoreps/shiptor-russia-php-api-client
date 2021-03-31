<?php

namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddMultiPlacePackage;

use ShiptorRussiaApiClient\Client\Core\Fields\Custom;

class Service extends Custom
{
    protected function setFields()
    {
        $this->getFieldsCollection()
            ->String("shopArticle")->setRequired()->add()
            ->Number("count")->setRequired()->add()
            ->Number("price")->setRequired()->add()
            ->Number("vat")->add()
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

    public function setShopArticle($article)
    {
        $this->getFieldsCollection()->get("shopArticle")->setValue($article);
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
}