<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyAddressException extends ClientException
{
    protected $message = 'Address cannot be empty.';
}