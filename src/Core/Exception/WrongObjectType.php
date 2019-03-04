<?php
namespace ShiptorRussiaApiClient\Client\Core\Exception;

use ShiptorRussiaApiClient\Client\Core\Lang\Messages;
/**
 * Class WrongObjectType
 */
class WrongObjectType extends \RuntimeException{
    /**
     * WrongObjectType constructor.
     * @param string $arParams
     */
    public function __construct($arParams){
        parent::__construct(vsprintf(Messages::get('EXC_WRONG_OBJECT_TYPE'), $arParams));
    }
}