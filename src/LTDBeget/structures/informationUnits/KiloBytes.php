<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 7:19 PM
 */

namespace LTDBeget\structures\informationUnits;

use LTDBeget\structures\informationUnits\base\InformationUnit;

/**
 * Class KiloBytes
 * 
 * @method KiloBytes add(InformationUnit $unit)
 * @method KiloBytes subtract(InformationUnit $unit)
 * @method KiloBytes multiply(InformationUnit $unit)
 * @method KiloBytes divide(InformationUnit $unit)
 * 
 * @package LTDBeget\structures\informationUnits
 */
class KiloBytes extends InformationUnit
{
    /**
     * KiloBytes constructor.
     *
     * @param float $amount
     *
     * @throws \OutOfBoundsException
     */
    public function __construct(float $amount)
    {
        parent::__construct($amount);
        $this->dimension = self::$kiloByte;
    }
}