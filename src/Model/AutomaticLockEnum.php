<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static WEEKLY()
 * @method static MONTHLY()
 * @method static OLDER_THAN()
 */
class AutomaticLockEnum extends Enum
{
    private const WEEKLY = 'WEEKLY';
    private const MONTHLY = 'MONTHLY';
    private const OLDER_THAN = 'OLDER_THAN';
}
