<?php
namespace ShiptorRussiaApiClient\Client\Core\Lang;

class En{
    public static $messages = array(
        'EXC_EMPTY_API_KEY' => 'Empty API key!',
        'EXC_EMPTY_VALUE' => 'Empty value of field `%s` in %s',
        'EXC_INVALID_ENUM_VALUE' => 'Invalid value `%s` of field `%s` in %s',
        'EXC_INVALID_TYPE' => 'Invalid type `%s` of field `%s` in %s',
        'EXC_UNAVAILABLE_METHOD' => 'Unavailable method `%s` in %s',
        'EXC_UNKNOWN_FIELD' => 'Unknown field `%s` in %s',
        'EXC_UNKNOWN_FIELD_TYPE' => 'Unknown field type `%s` in %s',
        'EXC_WRONG_API_KEY' => 'Wrong API key!',
        'EXC_WRONG_OBJECT_TYPE' => 'Wrong object type `%s` at %s, field %s'
    );
    public static function get($constName){
        return (!empty(static::$messages[$constName])?static::$messages[$constName]:null);
    }
}