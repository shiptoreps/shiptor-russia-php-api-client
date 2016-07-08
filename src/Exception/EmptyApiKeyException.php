<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyApiKeyException extends ClientException
{
    protected $message = 'Api key cannot be empty!';
}