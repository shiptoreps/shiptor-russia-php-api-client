<?php

namespace ShiptorRussiaApiClient\Client\Core\Exception;
/**
 * Class UnknownField
 */
class UnknownField extends \InvalidArgumentException{
    const MESSAGE = "Unknown field `%s` in %s";
    /**
     * UnknownField constructor.
     * @param string $arParams
     */
    public function __construct($arParams)
    {
        parent::__construct(vsprintf(self::MESSAGE, $arParams));
    }
}