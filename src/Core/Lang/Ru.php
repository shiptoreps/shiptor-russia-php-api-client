<?php
namespace ShiptorRussiaApiClient\Client\Core\Lang;

class Ru extends En{
    public static $messages = array(
        'EXC_EMPTY_API_KEY' => 'Не задан API ключ Shiptor!',
        'EXC_EMPTY_VALUE' => 'Не указано значение обязательного поля `%s` в запросе %s',
        'EXC_INVALID_ENUM_VALUE' => 'Неверное значение `%s` поля `%s` в запросе %s',
        'EXC_INVALID_TYPE' => 'Неверный тип значения `%s` поля `%s` в запросе %s',
        'EXC_UNAVAILABLE_METHOD' => 'Недоступный метод `%s` для запроса %s',
        'EXC_UNKNOWN_FIELD' => 'Неизвестное поле `%s` в запросе %s',
        'EXC_UNKNOWN_FIELD_TYPE' => 'Неизвестный тип поля `%s` в запросе %s',
        'EXC_WRONG_API_KEY' => 'Неправильный API ключ Shiptor',
        'EXC_WRONG_OBJECT_TYPE' => 'Неправильный тип объекта `%s` в %s, поле %s'
    );
}