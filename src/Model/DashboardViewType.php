<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static PROJECT()
 * @method static BILLABILITY()
 */
class DashboardViewType extends Enum
{
    protected const PROJECT = 'PROJECT';
    protected const BILLABILITY = 'BILLABILITY';
}
