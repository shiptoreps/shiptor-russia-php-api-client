<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyStreetException extends ClientException
{
    protected $message = 'Street cannot be empty!';
}