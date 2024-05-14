<?php 

namespace App\Enums;

class PercelStatus
{
    public const SENT = 1;
    public const RECEIVED = 2;
    public const RETURNED = 3;
    public const RECEIVE_RETURN = 4;

    public static function toArray(): array
    {
        return [
            self::SENT => 'Sent',
            self::RECEIVED => 'Received',
            self::RETURNED => 'Returned',
            self::RECEIVE_RETURN => 'Receive return',
        ];
    }

    public static function getName($value): string  
    {
        switch ($value)
        {
            case self::SENT:
                return 'Sent';
            case self::RECEIVED:
                return 'Received';
            case self::RETURNED:
                return 'Returned';
            case self::RECEIVE_RETURN:
                return 'Receive return';
            default:
                return 'Unknown';
        }  
    }
}