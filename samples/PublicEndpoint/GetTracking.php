<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor();

$response = $shiptor->PublicEndpoint()->getTracking()->query("RP<tracknum>")->send();

if($response instanceof ErrorResponse){
    echo '<p>'.$response->getMessage().'</p>';
}else{
    echo '<h2>'.$result->getTrackNumber().'</h2>';
    echo '<ol>';
    foreach($result->getCheckpoints() as $checkpoint){
        echo '<li>'.$checkpoint->getDate().' '.$checkpoint->getMessage().' '.$checkpoint->getDetails().'</li>';
    }
    echo '</ol>';
}