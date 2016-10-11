<?php
/**
 * @author: Viskov Sergey
 * @date  : 3/24/16
 * @time  : 6:23 PM
 */

namespace LTDBeget\structures\informationUnits\base;

use LTDBeget\structures\informationUnits\Bytes;
use LTDBeget\structures\informationUnits\KiloBytes;
use LTDBeget\structures\informationUnits\MegaBytes;
use LTDBeget\structures\informationUnits\GigaBytes;
use LTDBeget\structures\informationUnits\TeraBytes;
use LTDBeget\structures\informationUnits\PetaBytes;


/**
 * Class InformationUnit
 *
 * @package LTDBeget\structures\informationUnits\base
 */
abstract class InformationUnit
{
    /**
     * InformationUnit constructor.
     *
     * @param float $amount
     *
     * @throws \OutOfBoundsException
     */
    public function __construct(float $amount)
    {
        if($amount < 0) {
            throw new \OutOfBoundsException('Only positive ammount more then zero allowed');
        }
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount() : float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getDimension() : string
    {
        return self::$dimensionName[$this->dimension];
    }

    /**
     * @param InformationUnit $unit
     *
     * @return InformationUnit
     */
    public function add(InformationUnit $unit) : self
    {
        $value = self::convert($unit->getAmount(), $unit->getDimensionCode(), $this->getDimensionCode());
        $this->amount += $value;

        return $this;
    }

    /**
     * @param InformationUnit $unit
     *
     * @return InformationUnit
     * @throws \OutOfBoundsException
     */
    public function subtract(InformationUnit $unit) : self
    {
        $value = self::convert($unit->getAmount(), $unit->getDimensionCode(), $this->getDimensionCode());
        $result = $this->getAmount() - $value;
        
        if($result < 0) {
            throw new \OutOfBoundsException('Cannot subtract, less or equal zero result');
        } 
        
        $this->amount = $result;

        return $this;
    }

    /**
     * @param float $number
     *
     * @return InformationUnit
     */
    public function multiply(float $number) : self
    {
        $this->amount *= $number;

        return $this;
    }

    /**
     * @param float $number
     *
     * @return InformationUnit
     * @throws \OutOfBoundsException
     */
    public function divide(float $number) : self
    {
        /** @noinspection TypeUnsafeComparisonInspection */
        if($number == 0) {
            throw new \OutOfBoundsException('Cannot divide on zero');
        }
        $this->amount /= $number;

        return $this;
    }

    /**
     * @return Bytes
     * @throws \OutOfBoundsException
     */
    public function toB() : Bytes
    {
        return new Bytes(self::convert($this->getAmount(), $this->getDimensionCode(), self::$byte));
    }

    /**
     * @return KiloBytes
     * @throws \OutOfBoundsException
     */
    public function toKB() : KiloBytes
    {
        return new KiloBytes(self::convert($this->getAmount(), $this->getDimensionCode(), self::$kiloByte));
    }

    /**
     * @return MegaBytes
     * @throws \OutOfBoundsException
     */
    public function toMB() : MegaBytes
    {
        return new MegaBytes(self::convert($this->getAmount(), $this->getDimensionCode(), self::$megaByte));
    }

    /**
     * @return GigaBytes
     * @throws \OutOfBoundsException
     */
    public function toGB() : GigaBytes
    {
        return new GigaBytes(self::convert($this->getAmount(), $this->getDimensionCode(), self::$gigaByte));
    }

    /**
     * @return TeraBytes
     * @throws \OutOfBoundsException
     */
    public function toTB() : TeraBytes
    {
        return new TeraBytes(self::convert($this->getAmount(), $this->getDimensionCode(), self::$teraByte));
    }

    /**
     * @return PetaBytes
     * @throws \OutOfBoundsException
     */
    public function toPB() : PetaBytes
    {
        return new PetaBytes(self::convert($this->getAmount(), $this->getDimensionCode(), self::$petaByte));
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getAmount();
    }

    /**
     * @return string
     */
    public function asHumanReadableString() : string
    {
        return $this->getAmount() . ' ' . $this->getDimension();
    }

    /**
     * @param float $value
     * @param int   $fromDimension
     * @param int   $toDimension
     *
     * @return float
     *
     */
    protected static function convert(float $value, int $fromDimension, int $toDimension) : float
    {
        if($fromDimension > $toDimension) {
            $numberOfMultiplies = $fromDimension - $toDimension;
            for($i = 0; $i < $numberOfMultiplies; $i++) {
                $value *= self::$multiplier;
            }
        }

        if($fromDimension < $toDimension) {
            $numberOfDivides = $toDimension - $fromDimension;
            for($i = 0; $i < $numberOfDivides; $i++) {
                $value /= self::$multiplier;
            }
        }

        return $value;
    }

    /**
     * @return int
     */
    protected function getDimensionCode() : int
    {
        return $this->dimension;
    }

    /**
     * @var int
     */
    protected static $multiplier = 1024;

    /**
     * Dimension codes
     */
    protected static $byte      = 1;
    protected static $kiloByte  = 2;
    protected static $megaByte  = 3;
    protected static $gigaByte  = 4;
    protected static $teraByte  = 5;
    protected static $petaByte  = 6;

    /**
     * @var array
     */
    protected static $dimensionName = [
        1 => 'B',
        2 => 'kB',
        3 => 'MB',
        4 => 'GB',
        5 => 'TB',
        6 => 'PB'
    ];

    /**
     * @var int
     */
    protected $dimension;

    /**
     * @var float
     */
    private $amount;
}