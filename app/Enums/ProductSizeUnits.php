<?php 

namespace App\Enums;

class ProductSizeUnits
{
    public const CM = 1;
    public const M = 2;
    public const UNKNOWN = 0;

    public static function toArray(): array
    {
        return [
            self::CM => 'cm',
            self::M => 'm',
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::CM:
                return 'cm';
            case self::M:
                return 'm';
            default:
                return 'Unknown';
        }  
    }

    public static function getValue($name)  
    {
        switch($name)
        {
            case $name == 'CM' || $name == 'Cm' || $name = 'cm':
                return self::CM;
            case $name == 'm' || $name == 'M':
                return self::M;
            default:
                return self::UNKNOWN;
        }
    }
}