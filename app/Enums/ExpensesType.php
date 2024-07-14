<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum ExpensesType: int
{
    use EnumHelpers;

    case SALARY = 1;
    case ORDERS = 2;
    case OTHERS = 3;

    public function label(): string
    {
        return match ($this) {
            self::SALARY => 'مرتبات',
            self::ORDERS => 'طلبات',
            self::OTHERS => 'اخري'
        };
    }
}
