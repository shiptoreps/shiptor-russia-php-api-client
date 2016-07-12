<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyNameException extends ClientException
{
    protected $message = 'Name cannot be empty.';
}