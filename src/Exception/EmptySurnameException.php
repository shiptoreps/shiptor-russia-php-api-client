<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptySurnameException extends ClientException
{
    protected $message = 'Surname cannot be empty.';
}