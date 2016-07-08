<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyCountryException extends ClientException
{
    protected $message = 'Country cannot be empty!';
}