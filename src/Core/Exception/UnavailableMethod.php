<?php
namespace ShiptorRussiaApiClient\Client\Core\Exception;

use ShiptorRussiaApiClient\Client\Core\Lang\Messages;
/**
 * Class UnavailableMethod
 */
class UnavailableMethod extends \InvalidArgumentException{
    /**
     * UnknownField constructor.
     * @param string $arParams
     */
    public function __construct($arParams){
        parent::__construct(vsprintf(Messages::get('EXC_UNAVAILABLE_METHOD'), $arParams));
    }
}