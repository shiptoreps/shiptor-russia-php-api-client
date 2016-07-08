<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyDepartureException extends ClientException
{
    protected $message = 'Departure cannot be empty!';
}