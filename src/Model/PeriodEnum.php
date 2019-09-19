<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static DAYS()
 * @method static WEEKS()
 * @method static MONTHS()
 */
class PeriodEnum extends Enum
{
    private const DAYS = 'DAYS';
    private const WEEKS = 'WEEKS';
    private const MONTHS = 'MONTHS';
}
