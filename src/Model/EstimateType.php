<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static AUTO()
 * @method static MANUAL()
 */
class EstimateType extends Enum
{
    private const AUTO = 'AUTO';
    private const MANUAL = 'MANUAL';
}
