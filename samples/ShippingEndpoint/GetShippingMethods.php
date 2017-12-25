<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$response = $shiptor->ShippingEndpoint()->getShippingMethods()->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ol>
        <?php
        $result = $response->getResult();
        foreach($result->getMethods() as $method):?>
            <li>
                <ul>
                    <li>(<?php echo $method->getId()?>) <?php echo $method->getName()?></li>
                    <li><?php echo $method->getCategory()?></li>
                    <li><?php echo $method->getCourier()?></li>
                    <li><?php echo $method->getGroup()?></li>
                    <li><?php echo $method->getDescription()?></li>
                    <li><?php echo $method->getComment()?></li>
                </ul>
            </li>
        <?php
        endforeach;
        ?>
    </ol>
<?php
endif;