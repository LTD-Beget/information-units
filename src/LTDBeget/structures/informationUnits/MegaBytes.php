<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 6:27 PM
 */

namespace LTDBeget\structures\informationUnits;

use LTDBeget\structures\informationUnits\base\InformationUnit;

/**
 * Class MegaBytes
 *
 * @method MegaBytes add(InformationUnit $unit)
 * @method MegaBytes subtract(InformationUnit $unit)
 * @method MegaBytes multiply(InformationUnit $unit)
 * @method MegaBytes divide(InformationUnit $unit)
 * 
 * @package LTDBeget\structures\informationUnits
 */
class MegaBytes extends InformationUnit
{
    /**
     * Bytes constructor.
     *
     * @param float $amount
     *
     * @throws \OutOfBoundsException
     */
    public function __construct(float $amount)
    {
        parent::__construct($amount);
        $this->dimension = self::$megaByte;
    }
}