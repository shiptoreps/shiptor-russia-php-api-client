<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$request = $shiptor->ShippingEndpoint()->getShipment('<shipment_id>');

$response = $request->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ul>
        <?php
        $result = $response->getResult();?>
        <li><?php echo $result->getId()?></li>
        <li><?php echo $result->getAwaitingCount()?></li>
        <li><?php echo $result->getAwaitingProductCount()?></li>
        <li><?php echo $result->getStock()?></li>
        <li>
            <ol>
                <?php foreach ($result->getProducts() as $product):?>
                    <li><?php echo $product->getName()?></li>
                    <li><?php echo $product->getSku()?></li>
                    <li><?php echo $product->getArticle()?></li>
                    <li><?php echo $product->getShopArticle()?></li>
                    <li><?php echo $product->getLength()?></li>
                    <li><?php echo $product->getWidth()?></li>
                    <li><?php echo $product->getHeight()?></li>
                    <li><?php echo $product->getWeight()?></li>
                    <li><?php echo $product->getPrice()?></li>
                    <li><?php echo $product->getRetailPrice()?></li>
                    <li><?php echo $product->isFragile()?></li>
                    <li><?php echo $product->isDanger()?></li>
                    <li><?php echo $product->isPerishable()?></li>
                    <li><?php echo $product->isNeedBox()?></li>
                <?php endforeach?>
            </ol>
        </li>
    </ul>
<?php
endif;
?>