<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class WrongApiKey
 */
class WrongApiKey extends \InvalidArgumentException{
    protected $message = "Wrong API key!";
}