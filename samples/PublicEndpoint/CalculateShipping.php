<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor();

$response = $shiptor->PublicEndpoint()->calculateShipping()->setLength(10)->setWidth(10)->setHeight(10)
        ->setWeight(1)->setKladrId("77000000000")->setCod(1000)->setDeclaredCost(1000)->send();

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
                    <li><?php echo $method->getMinDays()?> - <?php echo $method->getMaxDays()?></li>
                    <li><?php echo $method->getMinDeclaredCost()?></li>
                    <li><?php echo implode(",", $method->getTypes())?></li>
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