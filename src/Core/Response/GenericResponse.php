<?php
namespace ShiptorRussiaApiClient\Client\Core\Response;

class GenericResponse{
    protected $response = null;
    protected $result = null;
    public function __construct($response,$resultClass) {
        $this->setResponse($response);
        if($this->isError()){
            throw new \Exception($this->response['error']['message']);
        }else{
            $this->setResult($resultClass);
        }
    }
    public function setResponse($response){
        $this->response = $response;
    }
    public function isError(){
        return !empty($this->response['error']);
    }
    public function setResult($resultClass){
        $this->result = new $resultClass($this->response['result']);
    }
    public function getResult(){
        return $this->result;
    }
    public function toArray(){
        return $this->response;
    }
}