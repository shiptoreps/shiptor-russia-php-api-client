<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$request = $shiptor->ShippingEndpoint()->addPackage()->setLength(10)->setWidth(20)->setHeight(10)
        ->setWeight(3)->setCod(4500)->setDeclaredCost(4500)->setExternalId("sdk123")->setShippingMethod(17)
        ->setComment("Тест!")->toMoscow()->setName("Тест")->setSurname("Тестов")->setPatronimic("Тестович")
        ->setEmail("test@test.ru")->setPhone("+79123456789")->setRegion("Москва")->setSettlement("Москва")
        ->setAddressLine("ул Тестовая 21")->forRu()->setPostalCode("101000");
$request->newProduct()->setShopArticle("43")->setCount(1)->setPrice(2000);
$request->newProduct()->setShopArticle("153")->setCount(1)->setPrice(2200);
$request->newService()->setShopArticle("SD28346")->setCount(1)->setPrice(300);

$response = $request->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <ul>
        <?php
        $result = $response->getResult();
        ?>
        <li><?php echo $result->getId()?>#<?php echo $result->getExternalId()?></li>
        <li><?php echo $result->getStatus()?> <?php echo $result->getCreateDate()?></li>
        <li><?php echo $result->getWeight()?></li>
        <li><?php echo $result->getLength()?></li>
        <li><?php echo $result->getWidth()?></li>
        <li><?php echo $result->getHeight()?></li>
        <li><?php echo $result->getCod()?></li>
        <li><?php echo $result->getDeclaredCost()?></li>
        <li><?php echo $result->getDeliveryTime()?></li>
        <li><?php echo $result->getTrackingNumber()?></li>
        <li><?php echo $result->getDelayedDeliveryAt()?></li>
        <li><?php echo $result->getLabel()?></li>
        <li><?php echo $result->getPickup()?></li>
        <?php if($result->hasPhotos()):?>
            <li>
                <ol>
                    <?php foreach($result->getPhotos() as $photo):?>
                        <li><a href="<?php echo $photo->getMedium()?>" target="_blank"><img src="<?php echo $photo->getMini()?>"></a></li>
                    <?php endforeach?>
                </ol>
            </li>
        <?php endif;
        $departure = $result->getDeparture();
        ?>
        <?php if($departure->hasDeliveryPoint()):
            $deliveryPoint = $departure->getDeliveryPoint();
            ?>
            <li>#<?php echo $deliveryPoint->getId()?> <?php $deliveryPoint->getAddress()?></li>
            <li><?php echo $deliveryPoint->getCourier()?></li>
            <li><?php echo $deliveryPoint->getAddress()?></li>
            <li><?php echo $deliveryPoint->getPhones()?></li>
            <li><?php echo $deliveryPoint->getDescription()?></li>
            <li><?php echo $deliveryPoint->getSchedule()?></li>
            <li><?php echo $deliveryPoint->getShippingDays()?></li>
            <li><?php echo $deliveryPoint->getCod()?></li>
            <li><?php echo $deliveryPoint->getLongitude()?> <?php echo $deliveryPoint->getLatitude()?></li>
            <li><?php echo $deliveryPoint->getKladrId()?></li>
            <li><?php echo implode(",",$deliveryPoint->getShippingMethods())?></li>
        <?php endif?>
        <li><?php echo $departure->getCashlessPayment()?></li>
        <li><?php echo $departure->getComment()?></li>
        <?php
        $shippingMethod = $departure->getShippigmethod();
        ?>
        <li><?php echo $shippingMethod->getId()?> <?php echo $shippingMethod->getName()?></li>
        <li><?php echo $shippingMethod->getCategory()?></li>
        <li><?php echo $shippingMethod->getGroup()?></li>
        <li><?php echo $shippingMethod->getCourier()?></li>
        <li><?php echo $shippingMethod->getComment()?></li>
        <li><?php echo $shippingMethod->getDescription()?></li>
        <?php
        $address = $departure->getAddress();
        ?>
        <li><?php echo $address->getReciever()?></li>
        <li><?php echo $address->getName()?> <?php echo $address->getPatronymic()?> <?php echo $address->getSurname()?></li>
        <li><?php echo $address->getEmail()?></li>
        <li><?php echo $address->getPhone()?></li>
        <li><?php echo $address->getCountryCode()?></li>
        <li><?php echo $address->getPostCode()?></li>
        <li><?php echo $address->getRegion()?></li>
        <li><?php echo $address->getSettlement()?></li>
        <li><?php echo $address->getStreet()?></li>
        <li><?php echo $address->getHouse()?></li>
        <li><?php echo $address->getApartment()?></li>
        <li><?php echo $address->getKladrId()?></li>
    </ul>
<?php
endif;
?>