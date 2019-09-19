<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static PROJECT()
 * @method static TEAM()
 * @method static REPORTS()
 */
class PagesEnum extends Enum
{
    private const PROJECT = 'PROJECT';
    private const TEAM = 'TEAM';
    private const REPORTS = 'REPORTS';
}
