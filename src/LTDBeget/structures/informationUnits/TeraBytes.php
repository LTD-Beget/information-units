<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 7:21 PM
 */

namespace LTDBeget\structures\informationUnits;

use LTDBeget\structures\informationUnits\base\InformationUnit;

/**
 * Class TeraBytes
 *
 * @method TeraBytes add(InformationUnit $unit)
 * @method TeraBytes subtract(InformationUnit $unit)
 * @method TeraBytes multiply(float $unit)
 * @method TeraBytes divide(float $unit)
 * 
 * @package LTDBeget\structures\informationUnits
 */
class TeraBytes extends InformationUnit
{
    /**
     * TeraBytes constructor.
     *
     * @param float $amount
     *
     * @throws \OutOfBoundsException
     */
    public function __construct(float $amount)
    {
        parent::__construct($amount);
        $this->dimension = self::$teraByte;
    }
}