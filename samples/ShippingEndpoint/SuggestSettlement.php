<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$response = $shiptor->PublicEndpoint()->SuggestSettlement()->query("<city>")->forRu()->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
        <?php
        $result = $response->getResult();
        foreach($result->getSettlementsList() as $settlement):?>
            <p><?php echo $settlement->getShortReadable()?> <?php echo($settlement->getKladrId())?></p>
        <?php
        endforeach;
        ?>
<?php
endif;