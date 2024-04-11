<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Type enum.
 *
 * @method static self NORMAL()
 * @method static self GOLD()
 * @method static self SILVER()
 */
class Type extends Enum
{
    //Types of users
    const NORMAL = 'normal';
    const GOLD = 'gold';
    const SILVER = 'silver';
}
