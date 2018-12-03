<?php
namespace ShiptorRussiaApiClient\Client\Core;

class Configuration{
    private static $encoding = "UTF-8";
    private static $apiKey = "";
    private static $name = "Shiptor Russia SDK";
    private static $version = "1.2.0";

    const PUBLIC_URL = "https://api.shiptor.ru/public/v1";
    const SHIPPING_URL = "https://api.shiptor.ru/shipping/v1";

    public static function setApiKey($apiKey){
        self::$apiKey = $apiKey;
    }
    public static function setEncoding($encoding){
        self::$encoding = $encoding;
    }
    public static function setName($name){
        self::$name = $name;
    }
    public static function setVersion($version){
        self::$version = $version;
    }
    public static function getApiKey(){
        return self::$apiKey;
    }
    public static function getEncoding(){
        return self::$encoding;
    }
    public static function getVersion(){
        return self::$version;
    }
    public static function getName(){
        return self::$name;
    }
}