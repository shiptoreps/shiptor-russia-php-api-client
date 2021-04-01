<?php
namespace ShiptorRussiaApiClient\Client\Core;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Configuration{
    private static $encoding = "UTF-8";
    private static $apiKey = "";
    private static $name = "Shiptor Russia SDK";
    private static $version = "1.6.3";
    private static $MAX_REQUEST_PER_SEC = 3;
    private static $lang = 'en';
    private static $shippingUrl;
    private static $publicUrl;
    private static $baseUrl = 'https://api.shiptor.ru';
    public static $last_query_ts = 0;
    public static $logger;

    const PUBLIC_URL = "/public/v1";
    const PUBLIC_URL_V2 = "/public/v2";
    const SHIPPING_URL = "/shipping/v1";
    const SHIPPING_URL_V2 = "/shipping/v2";

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
    public static function setBaseUrl($baseUrl){
        self::$baseUrl = $baseUrl;
    }
    public static function setShippingUrl($shippingUrl){
        self::$shippingUrl = $shippingUrl;
    }
    public static function setShippingUrlByVersion($shippingVersion){
        switch($shippingVersion){
            case 2:
                self::$shippingUrl = self::SHIPPING_URL_V2;
                break;
            default:
                self::$shippingUrl = self::SHIPPING_URL;
        }
    }
    public static function setPublicUrl($publicUrl){
        self::$publicUrl = $publicUrl;
    }
    public static function setPublicUrlByVersion($publicVersion){
        switch($publicVersion){
            case 2:
                self::$publicUrl = self::PUBLIC_URL_V2;
                break;
            default:
                self::$publicUrl = self::PUBLIC_URL;
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
    public static function getShippingUrl(){
        return self::$baseUrl.self::$shippingUrl;
    }
    public static function getPublicUrl(){
        return self::$baseUrl.self::$publicUrl;
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

    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }

    /**
     * @return LoggerInterface
     */
    public static function getLogger()
    {
        return self::$logger instanceof LoggerInterface ? self::$logger : new NullLogger();
    }
}