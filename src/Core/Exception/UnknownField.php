<?php
namespace ShiptorRussiaApiClient\Client\Core\Exception;

use ShiptorRussiaApiClient\Client\Core\Lang\Messages;
/**
 * Class UnknownField
 */
class UnknownField extends \InvalidArgumentException{
    /**
     * UnknownField constructor.
     * @param string $arParams
     */
    public function __construct($arParams){
        parent::__construct(vsprintf(Messages::get('EXC_UNKNOWN_FIELD'), $arParams));
    }
}