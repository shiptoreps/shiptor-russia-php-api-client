<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyWeightException extends ClientException
{
    protected $message = 'Weight cannot be empty!';
}