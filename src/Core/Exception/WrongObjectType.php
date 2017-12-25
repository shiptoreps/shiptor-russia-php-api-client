<?php
namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class WrongObjectType
 */
class WrongObjectType extends \RuntimeException{
    const MESSAGE = "Wrong object type `%s` at %s, field %s";
    /**
     * WrongObjectType constructor.
     * @param string $arParams
     */
    public function __construct($arParams)
    {
        parent::__construct(vsprintf(self::MESSAGE, $arParams));
    }
}