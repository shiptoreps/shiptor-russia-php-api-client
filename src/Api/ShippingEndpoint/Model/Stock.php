<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result;

class Stock extends Result{
    protected function init(){
        //
    }
    public function getId(){
        return $this->get("id");
    }
    public function getName(){
        return $this->get("name");
    }
    public function getAddress(){
        return $this->get("address");
    }
    public function getSlug(){
        return $this->get("slug");
    }
    public function getCountry(){
        return $this->get("country");
    }
    public function getKladr(){
        return $this->get("code");
    }
    public function getRoles(){
        return $this->get("roles");
    }
    public function hasLogisticRole(){
        $roles = $this->getRoles();
        return in_array(self::ROLE_LOGISTIC, $roles);
    }
    public function hasFulfilmentRole(){
        $roles = $this->getRoles();
        return in_array(self::ROLE_FULFILMENT, $roles);
    }
    const ROLE_LOGISTIC = 'logistic';
    const ROLE_FULFILMENT = 'fulfilment';
}