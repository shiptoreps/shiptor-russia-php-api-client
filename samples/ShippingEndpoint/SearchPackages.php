<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$response = $shiptor->ShippingEndpoint()->SearchPackages()->setQuery("RP314918")->setPage(1)->setPageSize(2)->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <?php
    $result = $response->getResult();
    if($result->hasPackages()){
        foreach($result->getPackages() as $package):?>
            <ul>
                <li><?php echo $package->getId()?>#<?php echo $package->getExternalId()?></li>
                <li><?php echo $package->getTrackingNumber()?></li>
                <li><?php echo $package->getTotalCost()?></li>
                <li><?php echo $package->getCreateDate()?></li>
            </ul>
        <?php endforeach;
    }
    ?>
<?php
endif;
?>