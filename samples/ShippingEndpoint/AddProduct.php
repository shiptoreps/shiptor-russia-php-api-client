<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Configuration,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


$shiptor = new Shiptor(array('API_KEY' => '<api ключ>'));

$request = $shiptor->ShippingEndpoint()->addProduct()->setLength(25)->setWidth(10)->setHeight(20)
        ->setWeight(1)->setShopArticle(43)->setFragile(true)->setRetailPrice(1450);

$response = $request->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ul>
        <?php
        $result = $response->getResult();
        ?>
        <li><?=$result->getName()?></li>
        <li><?=$result->getShopArticle()?></li>
        <li><?=$result->getRetailPrice()?></li>
        <li><?=$result->getLenth()?> x <?=$result->getWidth()?> x <?=$result->getHeight()?></li>
    </ul>
<?php
endif;