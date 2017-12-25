<?php
namespace ShiptorRussiaApiClient\Client\Api\PublicEndpoint\Model;

use ShiptorRussiaApiClient\Client\Core\Model\Result,
    ShiptorRussiaApiClient\Client\Core\Model\Checkpoint,
    ShiptorRussiaApiClient\Client\Core\Collection\GenericCollection as CheckpointsCollection;

class Tracking extends Result{
    private $checkpoints;
    protected function init(){
        $this->setCheckpoints();
    }
    private function setCheckpoints(){
        $this->checkpoints = new CheckpointsCollection($this->get("checkpoints"),Checkpoint::class);
    }
    public function getCheckpoints(){
        return $this->checkpoints;
    }
    public function getTrackNumber(){
        return $this->get("article");
    }
    public function getWeight(){
        return $this->get("weight");
    }
    public function getLength(){
        return $this->get("length");
    }
    public function getWidth(){
        return $this->get("width");
    }
    public function getHeight(){
        return $this->get("height");
    }
    public function getCourier(){
        return $this->get("courier");
    }
    public function getName(){
        return $this->get("receiver");
    }
    public function getPhone(){
        return $this->get("phone");
    }
    public function getAddress(){
        return $this->get("address");
    }
    public function getType(){
        return $this->get("type");
    }
}