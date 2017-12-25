<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$response = $shiptor->ShippingEndpoint()->getPackagesCount()->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <?php
    $result = $response->getResult();
    echo $result->getCount();
    ?>
<?php
endif;
?>