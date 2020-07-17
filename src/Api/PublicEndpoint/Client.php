<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint;

use ShiptorRussiaApiClient\Client\Core;

class Client extends Core\Client{
    protected function setApiUrl() {
        $this->apiUrl = Core\Configuration::getPublicUrl();
    }
}