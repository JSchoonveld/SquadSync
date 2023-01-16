<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * Class UserTypeEnum.
 * @method static self ADMIN()
 * @method static self TEAM_ADMIN()
 * @method static self TEAM_USER()
 */
final class UserTypeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'ADMIN' => 1,
            'TEAM_ADMIN' => 2,
            'TEAM_USER' => 3,
        ];
    }
}
