<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 7:19 PM
 */

namespace LTDBeget\structures\informationUnits;

use LTDBeget\structures\informationUnits\base\InformationUnit;

/**
 * Class Bytes
 *
 * @method Bytes add(InformationUnit $unit)
 * @method Bytes subtract(InformationUnit $unit)
 * @method Bytes multiply(InformationUnit $unit)
 * @method Bytes divide(InformationUnit $unit)
 * 
 * @package LTDBeget\structures\informationUnits
 */
class Bytes extends InformationUnit
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
        $this->dimension = self::$byte;
    }
}