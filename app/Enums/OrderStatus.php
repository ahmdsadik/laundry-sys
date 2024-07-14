<?php

namespace App\Enums;

use App\Traits\EnumHelpers;

enum OrderStatus :int
{
    use EnumHelpers;

    case PENDING = 1;
    case PROCESSING = 2;
    case COMPLETED = 3;
    case CANCELLED = 4;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'إنتظار',
            self::PROCESSING =>'قيد العمل',
            self::COMPLETED => 'مكتمل',
            self::CANCELLED => 'ألغيت'
        };
    }
}
