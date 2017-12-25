<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class EmptyValue
 */
class EmptyValue extends \InvalidArgumentException{
    const MESSAGE = "Empty value of field `%s` in %s";
    /**
     * EmptyValue constructor.
     * @param string $arParams
     */
    public function __construct($arParams)
    {
        parent::__construct(vsprintf(self::MESSAGE, $arParams));
    }
}