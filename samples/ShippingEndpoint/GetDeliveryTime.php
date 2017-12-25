<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$response = $shiptor->ShippingEndpoint()->getDeliveryTime()->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ul>
        <?php
        $result = $response->getResult();
        foreach($result as $key => $time):?>
            <li>
                <?php echo $key?>: <?php echo $time?>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
<?php
endif;
?>