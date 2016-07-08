<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class CodAmountException extends ClientException
{
    protected $message = 'Cash on delivery must be equal to the declared value!';
}