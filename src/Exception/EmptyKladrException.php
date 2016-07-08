<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyKladrException extends ClientException
{
    protected $message = 'Kladr cannot be empty!';
}