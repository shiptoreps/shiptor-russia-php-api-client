<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$request = $shiptor->ShippingEndpoint()->GetStatusList();

$response = $request->send();
if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ol>
        <?php
        $result = $response->getResult();
        foreach($result->getStatuses() as $status):?>
            <li>
                <?php echo $status->getName()?> (<?php echo $status->getCode()?>)
                <ol>
                    <?php foreach($status->getGroup() as $code => $name):?>
                    <li>(<?php echo $code ?>) <?php echo $name ?></li>
                    <?php endforeach ?>
                </ol>
            </li>
        <?php
        endforeach;
        ?>
    </ol>
<?php
endif;
