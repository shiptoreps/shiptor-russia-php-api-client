<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$response = $shiptor->ShippingEndpoint()->calculateShippingInternational()->setLength(20)
        ->setWidth(20)->setheight(20)->setWeight(2)->fromRu()->setCountryTo("US")->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ul>
        <?php
        $result = $response->getResult();
        foreach($result->getMethodsList() as $method):?>
            <li>
                <ol>
                    <li><?php echo $method->getName()?></li>
                    <li><?php echo $method->getCategory()?></li>
                    <li><?php echo $method->getCourier()?></li>
                    <li><?php echo $method->getGroup()?></li>
                    <li><?php echo $method->getDescription()?></li>
                    <li><?php echo $method->getComment()?></li>
                    <li><?php echo $method->getTotalReadable()?></li>
                    <li>
                        <ul>
                            <?php
                            foreach($method->getServices() as $service):?>
                            <li>
                                <?php echo $service->getCode()?>: <?php echo $service->getReadable()?>
                            </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </li>
                </ol>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
<?php
endif;
?>