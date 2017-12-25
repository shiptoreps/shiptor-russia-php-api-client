<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor();

$response = $shiptor->PublicEndpoint()->getCountries()->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <?php
    $result = $response->getResult();
    foreach($result->getCountriesList() as $country):?>
        <p><?php echo $country->getCode()?> <?php echo $country->getName()?></p>
    <?php
    endforeach;
    ?>
<?php
endif;