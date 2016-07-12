<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyPhoneException extends ClientException
{
    protected $message = 'Phone cannot be empty.';
}