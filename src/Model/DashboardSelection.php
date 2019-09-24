<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static ME()
 * @method static TEAM()
 */
class DashboardSelection extends Enum
{
    private const ME = 'ME';
    private const TEAM = 'TEAM';
}
