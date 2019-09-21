<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static ACTIVE()
 * @method static DONE()
 */
class TaskStatus extends Enum
{
    private const ACTIVE ='ACTIVE';
    private const DONE ='DONE';
}
