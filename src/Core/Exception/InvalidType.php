<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class InvalidType
 */
class InvalidType extends \InvalidArgumentException{
    const MESSAGE = "Invalid type `%s` of field `%s` in %s";
    /**
     * InvalidType constructor.
     * @param string $arParams
     */
    public function __construct($arParams)
    {
        parent::__construct(vsprintf(self::MESSAGE, $arParams));
    }
}