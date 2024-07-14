<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum PaymentType: int
{
    use EnumHelpers;

    case CASH = 1;
    case DEFERRED = 2;

    public function label(): string
    {
        return match ($this) {
            self::CASH => 'دفع كاش',
            self::DEFERRED => 'دفع آجل',
        };
    }
}
