<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum PaymentStatus: int
{
    use EnumHelpers;

    case PAID = 1;
    case UNPAID = 2;

    public function label(): string
    {
        return match ($this) {
            self::PAID => 'مدفوع',
            self::UNPAID => 'لم يتم الدفع'
        };
    }
}
