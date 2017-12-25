<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class UnknownFieldType
 */
class UnknownFieldType extends \InvalidArgumentException{
    const MESSAGE = "Unknown field type `%s` in %s";
    /**
     * UnknownFieldType constructor.
     * @param string $arParams
     */
    public function __construct($arParams)
    {
        parent::__construct(vsprintf(self::MESSAGE, $arParams));
    }
}