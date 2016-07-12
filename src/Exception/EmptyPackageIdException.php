<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyPackageIdException extends ClientException
{
    protected $message = 'Package id cannot be empty.';
}