<?php
namespace ShiptorRussiaApiClient\Client\Core\Exception;

use ShiptorRussiaApiClient\Client\Core\Lang\Messages;
/**
 * Class EmptyValue
 */
class EmptyValue extends \InvalidArgumentException{
    /**
     * EmptyValue constructor.
     * @param string $arParams
     */
    public function __construct($arParams){
        parent::__construct(vsprintf(Messages::get('EXC_EMPTY_VALUE'), $arParams));
    }
}