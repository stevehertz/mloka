<?php 

namespace App\Enums;

class DefaultStatus
{

    public const DEFAULT_SHOP = 1;
    public const OTHER_SHOP = 0;

    public static function toArray(): array
    {
        return [
            self::DEFAULT_SHOP => 'Default',
            self::OTHER_SHOP => 'Other',
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::DEFAULT_SHOP:
                return 'Default';
            case self::OTHER_SHOP:
                return 'Others';
            default:
                return 'Unknown';
        }  
    }
}