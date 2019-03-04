<?php
namespace ShiptorRussiaApiClient\Client\Core\Exception;

use ShiptorRussiaApiClient\Client\Core\Lang\Messages;
/**
 * Class InvalidEnumValue
 */
class InvalidEnumValue extends \InvalidArgumentException{
    /**
     * InvalidEnumValue constructor.
     * @param string $arParams
     */
    public function __construct($arParams){
        parent::__construct(vsprintf(Messages::get('EXC_INVALID_ENUM_VALUE'), $arParams));
    }
}