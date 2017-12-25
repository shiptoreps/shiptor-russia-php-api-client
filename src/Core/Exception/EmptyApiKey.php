<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class EmptyApiKey
 */
class EmptyApiKey extends \InvalidArgumentException{
    protected $message = "Empty API key!";
}