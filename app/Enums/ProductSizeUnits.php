<?php 

namespace App\Enums;

class ProductSizeUnits
{
    public const CM = 1;
    public const M = 2;

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
}