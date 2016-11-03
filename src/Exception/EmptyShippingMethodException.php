<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyShippingMethodException extends ClientException
{
    protected $message = 'Shipping method cannot be empty.';
}