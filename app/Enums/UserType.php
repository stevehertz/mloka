<?php

namespace App\Enums;

class UserType
{
    public const OWNER = 1;
    public const EMPLOYEE = 2;
    public const CUSTOMER = 3;

    public static function toArray(): array
    {
        return [
            self::OWNER => 'Owner',
            self::EMPLOYEE => 'Employee',
            self::CUSTOMER => 'Customer',
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::OWNER:
                return 'Owner';
            case self::EMPLOYEE:
                return 'Employee';
            case self::CUSTOMER:
                return 'Customer';
            default:
                return 'Unknown';
        }  
    }
}