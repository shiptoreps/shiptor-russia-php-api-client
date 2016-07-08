<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyDimensionsException extends ClientException
{
    protected $message = 'Dimensions cannot be empty!';
}