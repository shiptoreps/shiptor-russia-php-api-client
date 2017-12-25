<?php
namespace ShiptorRussiaApiClient\Client\Core\Response;

class ErrorResponse{
    private $message;
    public function __construct($message) {
        $this->message = $message;
    }
    public function getMessage(){
        return $this->message;
    }
}