<?php
use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

$shiptor = new Shiptor();

$response = $shiptor->PublicEndpoint()->getDaysOff()->between("2017-12-20","2017-12-31")->send();

if($response instanceof ErrorResponse):?>
    <p><?php echo $response->getMessage()?></p>
<?php else:?>
        <?php
        $result = $response->getResult();
        ?>
        <ul>
            <?php
            foreach($result->getDaysOff() as $dayOff):?>
                <li><?php echo $dayOff?></li>
            <?php
            endforeach;
            ?>
        </ul>
<?php
endif;