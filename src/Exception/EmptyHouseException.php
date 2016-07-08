<?php
namespace ShiptorRussiaApiClient\Client\Exception;

class EmptyHouseException extends ClientException
{
    protected $message = 'House cannot be empty!';
}