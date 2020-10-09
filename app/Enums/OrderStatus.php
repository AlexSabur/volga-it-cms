<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static Treatment()
 * @method static static Sent()
 * @method static static Received()
 * @method static static Canceled()
 */
final class OrderStatus extends Enum implements LocalizedEnum
{
    const Treatment =   0;
    const Sent =        1;
    const Received =    2;
    const Canceled =    3;
}
