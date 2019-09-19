<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static MONDAY()
 * @method static TUESDAY()
 * @method static WEDNESDAY()
 * @method static THURSDAY()
 * @method static FRIDAY()
 * @method static SATURDAY()
 * @method static SUNDAY()
 */
class DaysEnum extends Enum
{
    private const MONDAY = 'MONDAY';
    private const TUESDAY = 'TUESDAY';
    private const WEDNESDAY = 'WEDNESDAY';
    private const THURSDAY = 'THURSDAY';
    private const FRIDAY = 'FRIDAY';
    private const SATURDAY = 'SATURDAY';
    private const SUNDAY = 'SUNDAY';
}
