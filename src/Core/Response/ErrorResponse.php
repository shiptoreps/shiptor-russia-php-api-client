<?php
namespace ShiptorRussiaApiClient\Client\Core\Response;

class ErrorResponse{
    private $message = null;
    private $code = null;
    public function __construct($e) {
        $this->message = $e->getMessage();
        $this->code = $e->getCode();
    }
    public function getMessage(){
        return $this->message;
    }
    public function getCode(){
        return $this->code;
    }
    const UNIVERSAL_ERROR_CODE = -32602;
}