<?php
namespace ShiptorRussiaApiClient\Client\Handler;

use ShiptorRussiaApiClient\Client\Exception\CodAmountException;
use ShiptorRussiaApiClient\Client\Exception\EmptyAddressException;
use ShiptorRussiaApiClient\Client\Exception\EmptyCountryException;
use ShiptorRussiaApiClient\Client\Exception\EmptyDepartureException;
use ShiptorRussiaApiClient\Client\Exception\EmptyDimensionsException;
use ShiptorRussiaApiClient\Client\Exception\EmptyEmailException;
use ShiptorRussiaApiClient\Client\Exception\EmptyHouseException;
use ShiptorRussiaApiClient\Client\Exception\EmptyNameException;
use ShiptorRussiaApiClient\Client\Exception\EmptyPhoneException;
use ShiptorRussiaApiClient\Client\Exception\EmptyPostalCodeException;
use ShiptorRussiaApiClient\Client\Exception\EmptyStreetException;
use ShiptorRussiaApiClient\Client\Exception\EmptySurnameException;
use ShiptorRussiaApiClient\Client\Exception\EmptyWeightException;
use ShiptorRussiaApiClient\Client\Exception\ShippingMethodException;

class PackageHandler
{
    public function validate($package)
    {
        if (empty($package['length']) || empty($package['width']) || empty($package['height'])) {
            throw new EmptyDimensionsException();
        }

        if (empty($package['weight'])) {
            throw new EmptyWeightException();
        }

        if (!empty($package['cod']) &&  !empty($package['declared_cost']) && $package['cod'] != $package['declared_cost']) {
            throw new CodAmountException();
        }

        if (empty($package['departure'])) {
            throw new EmptyDepartureException();
        }

        if (empty($package['departure']['shipping_method'])) {
            throw new ShippingMethodException();
        }

        if (empty($package['departure']['address'])) {
            throw new EmptyAddressException();
        }

        if (empty($package['departure']['address']['country'])) {
            throw new EmptyCountryException();
        }

        if (empty($package['departure']['address']['name'])) {
            throw new EmptyNameException();
        }

        if (empty($package['departure']['address']['surname'])) {
            throw new EmptySurnameException();
        }

        if (empty($package['departure']['address']['email'])) {
            throw new EmptyEmailException();
        }

        if (empty($package['departure']['address']['phone'])) {
            throw new EmptyPhoneException();
        }

        if (empty($package['departure']['address']['postal_code'])) {
            throw new EmptyPostalCodeException();
        }

        if (empty($package['departure']['address']['street'])) {
            throw new EmptyStreetException();
        }

        if (empty($package['departure']['address']['house'])) {
            throw new EmptyHouseException();
        }
    }
}