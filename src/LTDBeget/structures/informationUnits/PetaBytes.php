<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 7:21 PM
 */

namespace LTDBeget\structures\informationUnits;

use LTDBeget\structures\informationUnits\base\InformationUnit;

/**
 * Class PetaBytes
 * 
 * @method PetaBytes add(InformationUnit $unit)
 * @method PetaBytes subtract(InformationUnit $unit)
 * @method PetaBytes multiply(float $unit)
 * @method PetaBytes divide(float $unit)
 * 
 * @package LTDBeget\structures\informationUnits
 */
class PetaBytes extends InformationUnit
{
    /**
     * PetaBytes constructor.
     *
     * @param float $amount
     *
     * @throws \OutOfBoundsException
     */
    public function __construct(float $amount)
    {
        parent::__construct($amount);
        $this->dimension = self::$petaByte;
    }
}