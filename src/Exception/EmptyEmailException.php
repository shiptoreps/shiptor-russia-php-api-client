<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyEmailException extends ClientException
{
    protected $message = 'Email cannot be empty.';
}