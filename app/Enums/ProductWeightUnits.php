<?php 

namespace App\Enums;

class ProductWeightUnits
{
    public const KG = 1;
    public const LBS = 2;
    public const UNKNOWN = 0;

    public static function toArray(): array
    {
        return [
            self::KG => 'Kg',
            self::LBS => 'Lbs',
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::KG:
                return 'Kg';
            case self::LBS:
                return 'Lbs';
            default:
                return 'Unknown';
        }  
    }

    public static function getValue($name)  
    {
        switch($name)
        {
            case $name == 'KG' || $name == 'Kg' || $name = 'kg':
                return self::KG;
            case $name == 'lbs' || $name == 'Lbs' || $name == 'LBS':
                return self::LBS;
            default:
                return self::UNKNOWN;
        }
    }
}