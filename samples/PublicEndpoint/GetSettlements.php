<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor();

$response = $shiptor->PublicEndpoint()->GetSettlements()->setPageSize(10)->setPage(1)->forRu()->onlyCities()->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
        <?php
        $result = $response->getResult();
        foreach($result->getSettlementsList() as $settlement):?>
            <p><?php echo $settlement->getTypeShort()?> <?php echo($settlement->getName())?> <?php echo($settlement->getKladrId())?></p>
            <?php if($settlement->hasParents()):?>
                <ul>
                    <?php foreach($settlement->getParents() as $parent):?>
                        <li><?php echo($parent->getName())?> <?php echo $parent->getTypeShort()?> <?php echo($parent->getKladrId())?></li>
                    <?php endforeach?>
                </ul>
            <?php endif?>
        <?php
        endforeach;
        ?>
<?php
endif;