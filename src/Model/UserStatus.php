<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static ACTIVE()
 * @method static PENDING_EMAIL_VERIFICATION()
 * @method static NOT_REGISTERED()
 * @method static DELETED()
 */
class UserStatus extends Enum
{
    private const ACTIVE = 'ACTIVE';
    private const PENDING_EMAIL_VERIFICATION = 'PENDING_EMAIL_VERIFICATION';
    private const NOT_REGISTERED = 'NOT_REGISTERED';
    private const DELETED = 'DELETED';
}
