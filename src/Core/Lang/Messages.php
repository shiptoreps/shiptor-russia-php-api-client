<?php
namespace ShiptorRussiaApiClient\Client\Core\Lang;

use ShiptorRussiaApiClient\Client\Core\Configuration;

class Messages{
    private static $langClass = null;
    public static function get($message){
        if(empty(self::$langClass)){
            self::setLangClass();
        }
        $langClass = self::$langClass;
        return $langClass::get($message);
    }
    public static function setLangClass(){
        switch (Configuration::getLang()){
            case 'ru':
                self::$langClass = Ru::class;
                break;
            case 'en':default:
                self::$langClass = En::class;
                break;
        }
    }
}