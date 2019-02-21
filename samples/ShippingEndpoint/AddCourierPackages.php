<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor(["API_KEY" => "<apikey>"]);

$request = $shiptor->ShippingEndpoint()->addCourierPackages()->forDpd()->setReciever("Тест Тестов Тестов")
        ->setSurname("Тестов")->setPatronymic("Тестович")->setEmail("test@test.ru")
        ->setPhone("+79123456789")->fromRu()->setRegion("Москва")->setSettlement("Москва")
        ->setPostalCode("101000")->setStreet("ул. Тестовая")->setHouse("21")->setApartment("7")
        ->setKladrId("77000000000")->setDate(date("d.m.Y",strtotime("+1day")))->setComment("Тестов тест");

$packageOne = $request->newPackage()->setLength(10)->setWidth(20)->setHeight(10)
        ->setWeight(3)->setCod(4500)->setDeclaredCost(4500)->setExternalId("sdk123")->setShippingMethod(17)
        ->setComment("Тест!")->toMoscow()->setName("Тест1")->setSurname("Тестов1")->setPatronymic("Тестович1")
        ->setEmail("test@test.ru")->setPhone("+79123456789")->setRegion("Москва")->setSettlement("Москва")
        ->setAddressLine("ул Тестовая 22")->toRu()->setPostalCode("101001");

$packageOne->newProduct()->setShopArticle("43")->setCount(1)->setPrice(2000);
$packageOne->newProduct()->setShopArticle("153")->setCount(1)->setPrice(2200);
$packageOne->newService()->setShopArticle("SD28346")->setCount(1)->setPrice(300);

$packageTwo = $request->newPackage()->setLength(20)->setWidth(10)->setHeight(20)
        ->setWeight(3)->setCod(4500)->setDeclaredCost(4500)->setExternalId("sdk124")->setShippingMethod(17)
        ->setComment("Тест!")->toMoscow()->setName("Тест2")->setSurname("Тестов2")->setPatronymic("Тестович2")
        ->setEmail("test@test.ru")->setPhone("+79123456789")->setRegion("Москва")->setSettlement("Москва")
        ->setAddressLine("ул Тестовая 22")->toRu()->setPostalCode("101002");

$packageTwo->newProduct()->setShopArticle("43")->setCount(2)->setPrice(2000);
$packageTwo->newProduct()->setShopArticle("153")->setCount(2)->setPrice(2200);
$packageTwo->newService()->setShopArticle("SD28346")->setCount(1)->setPrice(300);

$response = $request->send();
if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
    <?php
    $result = $response->getResult();
    $shipment = $result->getShipment();
    if($result->hasPackages()){
        foreach($result->getPackages() as $package){
            
        }
    }
    ?>
<?php endif ?>