<?php 

namespace App\Enums;

class CustomerStatus
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public static function toArray(): array
    {
        return [
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::ACTIVE:
                return 'Active';
            case self::INACTIVE:
                return 'Inactive';
            default:
                return 'Unknown';
        }  
    }
}