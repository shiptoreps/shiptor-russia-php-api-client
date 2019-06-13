<?php
namespace ShiptorRussiaApiClient\Client\Core;

class Configuration{
    private static $encoding = "UTF-8";
    private static $apiKey = "";
    private static $name = "Shiptor Russia SDK";
    private static $version = "1.3.8.1";
    private static $MAX_REQUEST_PER_SEC = 3;
    private static $lang = 'en';
    public static $last_query_ts = 0;

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
    public static function setLang($lang){
        if(in_array($lang,array('en','ru'))){
            self::$lang = $lang;
        }
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
    public static function getLang(){
        return self::$lang;
    }
    public static function getMaxRequestFrequency(){
        if(self::$MAX_REQUEST_PER_SEC == 0){
            return 0;
        }
        return round(1/self::$MAX_REQUEST_PER_SEC, 3);
    }
    public static function getMaxRequestNum(){
        return self::$MAX_REQUEST_PER_SEC;
    }
    public static function setMaxRequestNum($numOfRequest){
        self::$MAX_REQUEST_PER_SEC = intval($numOfRequest);
    }
}