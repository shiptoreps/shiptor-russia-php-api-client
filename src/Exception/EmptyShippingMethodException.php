<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class ShippingMethodException extends ClientException
{
    protected $message = 'Shipping method cannot be empty!';
}