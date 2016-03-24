<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 7:21 PM
 */

namespace LTDBeget\structures\informationUnits;

use LTDBeget\structures\informationUnits\base\InformationUnit;

/**
 * Class GigaBytes
 * 
 * @method GigaBytes add(InformationUnit $unit)
 * @method GigaBytes subtract(InformationUnit $unit)
 * @method GigaBytes multiply(float $unit)
 * @method GigaBytes divide(float $unit)
 * 
 * @package LTDBeget\structures\informationUnits
 */
class GigaBytes extends InformationUnit
{
    /**
     * GigaBytes constructor.
     *
     * @param float $amount
     *
     * @throws \OutOfBoundsException
     */
    public function __construct(float $amount)
    {
        parent::__construct($amount);
        $this->dimension = self::$gigaByte;
    }
}