<?php
namespace ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request;

use ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Request\GenericRequest as GenericShippingRequest,
    ShiptorRussiaApiClient\Client\Api\ShippingEndpoint\Model\Packages as SearchPackagesResult;

class SearchPackages extends GenericShippingRequest{
    protected $name = "searchPackages";
    protected function initFields(){
        $this->getFieldsCollection()
                ->String("query")->setRequired()->add()
                ->Number("page")->setRequired()->add()
                ->Number("per_page")->setRequired()->add();
    }
    public function setQuery($query){
        return $this->setField("query",$query);
    }
    public function setPage($page){
        return $this->setField("page",$page);
    }
    public function setPageSize($pageSize){
        return $this->setField("per_page",$pageSize);
    }
    public function getResponseClassName(){
        return SearchPackagesResult::class;
    }
}