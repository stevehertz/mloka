<?php 

namespace App\Enums;

class Gender {

    public const MALE = 1;
    public const FEMALE = 2;
    public const OTHERS = 3;

    public static function toArray(): array
    {
        return [
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::OTHERS => 'Others'
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::MALE:
                return 'Male';
            case self::FEMALE:
                return 'Female';
            case self::OTHERS:
                return 'Others';
            default:
                return 'Unknown';
        }  
    }

    public static function getValue($name)  
    {
        switch($name)
        {
            case $name == 'Male' || $name == 'MALE' || $name = 'male':
                return self::MALE;
            case $name == 'Female' || $name == 'FEMALE' || $name = 'female':
                return self::FEMALE;
            default:
                return self::OTHERS;
        }
    }
}