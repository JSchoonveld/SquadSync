<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self index()
 * @method static self show()
 * @method static self create()
 */
class MailModeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'index' => 1,
            'show' => 2,
            'create' => 3,
        ];
    }
}
