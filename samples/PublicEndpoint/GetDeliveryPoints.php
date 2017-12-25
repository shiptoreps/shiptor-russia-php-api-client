<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor();

$response = $shiptor->PublicEndpoint()->GetDeliveryPoints()->inMoscow()->forDpd()->setShippingMethod(18)->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
        <?php
        $result = $response->getResult();
        foreach($result->getDeliveryPoints() as $pvz):?>
            <p><?php echo($pvz->getId())?> <?php echo($pvz->getAddress())?></p>
            <ul>
                <li><?php echo($pvz->getCourier())?></li>
                <li><?php echo(implode(",",$pvz->getPhones()))?></li>
                <li><?php echo($pvz->getDescription())?></li>
                <li><?php echo($pvz->getSchedule())?></li>
                <li><?php echo($pvz->getShippingDays())?></li>
                <li><?php echo($pvz->getCod())?></li>
                <li><?php echo($pvz->getLongitude())?></li>
                <li><?php echo($pvz->getLatitude())?></li>
                <li><?php echo($pvz->getKladrId())?></li>
                <li><?php echo(implode(",",$pvz->getShippingMethods()))?></li>
            </ul>
        <?php
        endforeach;
        ?>
<?php
endif;