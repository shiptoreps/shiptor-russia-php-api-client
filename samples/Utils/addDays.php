<?php
use ShiptorRussiaApiClient\Client\Utils;

require_once $_SERVER['DOCUMENT_ROOT'].'vendor/autoload.php';
/*
 * Функции для добавления заданного количества рабочих дней.
 * Utils::addWorkingDaysText добавляет рабочие дни с учетом возвращаемых методом
 * getDaysOff праздничных и выходных дней
 */
echo "<p>С учетом рабочих дней: ". Utils::addWorkingDaysText("1-2 дня", 6)."</p>";
echo "<p>Без учета рабочих дней: ". Utils::addDaysText("1-2 дня", 6)."</p>";