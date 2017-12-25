<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Fields\AddShipment;

use ShiptorRussiaApiClient\Client\Core\Fields\Custom;

class Product extends Custom{
    protected function setFields(){
        $this->getFieldsCollection()
                ->String("shopArticle")->setRequired()->add()
                ->Number("awaitingCount")->setRequired()->add();
    }
    public function setShopArticle($article){
        $this->getFieldsCollection()->get('shopArticle')->setValue($article);
        return $this;
    }
    public function setCount($count){
        $this->getFieldsCollection()->get('awaitingCount')->setValue($count);
        return $this;
    }
    public function checkSingleValue($value){
        return is_array($value);
    }
    public function convertValue($value) {
        return (array)$value;
    }
}