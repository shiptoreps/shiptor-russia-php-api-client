<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyPostalCodeException extends ClientException
{
    protected $message = 'Postal code cannot be empty.';
}