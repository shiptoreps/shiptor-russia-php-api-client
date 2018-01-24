<?php
namespace ShiptorRussiaApiClient\Client;

use ShiptorRussiaApiClient\Client\Shiptor,
    ShiptorRussiaApiClient\Client\Core\Response\ErrorResponse;

class Utils{
    const ENUM_TEXT = "%d %s";
    const WORKING_DAYS = "рабочий день|рабочих дня|рабочих дней";
    const DAYS = "день|дня|дней";

    public static function addWorkingDaysText($daysText,$numOfDays){
        $tomorrow = date("Y-m-d",strtotime("+1day"));
        $dayTo = date("Y-m-d",strtotime("+30day"));
        $shiptor = new Shiptor();
        $response = $shiptor->PublicEndpoint()->getDaysOff()->between($tomorrow,$dayTo)->send();
        if($response instanceof ErrorResponse){
            return $response->getMessage();
        }
        $daysOff = $response->getResult();
        for($i = 1;$i <= $numOfDays;$i++){
            $currentDay = date("Y-m-d",strtotime("+{$i}day"));
            if(in_array($currentDay,$daysOff->toArray())){
                $numOfDays++;
            }
        }
        return static::addDaysText($daysText,$numOfDays);
    }
    public static function addDaysText($daysText,$numOfDays){
        if(strpos($daysText,"-") !== false){
            $periods = explode("-",$daysText);
            $dStart = intval($periods[0]) + $numOfDays;
            $dEnd = intval($periods[1]) + $numOfDays;
            $daysText = $dStart ."-". static::getPluralEnumDays($dEnd);
        }else{
            $dStart = intval($daysText) + $numOfDays;
            $daysText = static::getPluralEnumDays($dStart);
        }
        return $daysText;
    }
    public static function getPluralEnumDays($number){
        return static::getPluralEnumeration($number,static::WORKING_DAYS);
    }
    public static function getPluralEnumeration($number,$enumerationText){
        if(!is_array($enumerationText)){
            $arLabels = explode("|",$enumerationText);
        }else{
            $arLabels = $enumerationText;
        }
        $variant = array (2, 0, 1, 1, 1, 2);
        $enumerationTextResult = $arLabels[ ($number%100 > 4 && $number%100 < 20)? 2 : $variant[min($number%10, 5)] ];
        return vsprintf(static::ENUM_TEXT,array($number,$enumerationTextResult));
    }
}