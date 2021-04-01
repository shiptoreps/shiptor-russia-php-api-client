<?php

namespace ShiptorRussiaApiClient\Client\Test\Core;

use Psr\Log\Test\TestLogger;
use ShiptorRussiaApiClient\Client\Core\Configuration;
use PHPUnit_Framework_TestCase;
use ShiptorRussiaApiClient\Client\Shiptor;

class ConfigurationTest extends PHPUnit_Framework_TestCase
{
    public function testSetLogger()
    {
        $logger = new TestLogger();
        Configuration::setLogger($logger);

        $this->assertInstanceOf(TestLogger::class, Configuration::getLogger());

        $shiptor = new Shiptor(['API_KEY' => 'UndefinedKeyWithLengthEqualsOrMoreThen40']);

        $logger->reset();
        $shiptor->ShippingEndpoint()->getStatusList()->send();
        $this->assertNotEmpty($logger->records[0]);
        $this->assertStringStartsWith('Request', $logger->records[0]['message']);

        $logger->reset();
        $shiptor->PublicEndpoint()->getCountries()->send();
        $this->assertNotEmpty($logger->records[0]);
        $this->assertStringStartsWith('Request', $logger->records[0]['message']);
    }
}
