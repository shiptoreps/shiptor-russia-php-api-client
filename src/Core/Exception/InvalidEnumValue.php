<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class InvalidEnumValue
 */
class InvalidEnumValue extends \InvalidArgumentException{
    const MESSAGE = "Invalid value `%s` of field `%s` in %s";
    /**
     * UnknownField constructor.
     * @param string $arParams
     */
    public function __construct($arParams)
    {
        parent::__construct(vsprintf(self::MESSAGE, $arParams));
    }
}