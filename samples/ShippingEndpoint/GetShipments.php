<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$request = $shiptor->ShippingEndpoint()->getShipments()->setPage(1)->setPageSize(10);

$response = $request->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ul>
        <?php
        $result = $response->getResult();
        ?>
        <li><?php echo $result->getCount()?></li>
        <li><?php echo $result->getPage()?></li>
        <li><?php echo $result->getPageSize()?></li>
        <li><?php echo $result->getPagesCount()?></li>
        <li>
            <ol>
                <?php foreach($result->getShipments() as $shipment):?>
                    <li><?php echo $shipment->getId()?></li>
                    <li><?php echo $shipment->getAwaitingCount()?></li>
                    <li><?php echo $shipment->getAwaitingProductCount()?></li>
                    <li><?php echo $shipment->getStock()?></li>
                    <li>
                        <ul>
                            <?php foreach ($shipment->getProducts() as $product):?>
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
                        </ul>
                    </li>
                <?php endforeach?>
            </ol>
        </li>
    </ul>
<?php
endif;
?>