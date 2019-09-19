<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use MyCLabs\Enum\Enum;

/**
 * @method static PENDING()
 * @method static ACTIVE()
 * @method static DECLINED()
 * @method static INACTIVE()
 */
class MembershipEnum extends Enum
{
    private const PENDING = 'PENDING';
    private const ACTIVE = 'ACTIVE';
    private const DECLINED = 'DECLINED';
    private const INACTIVE = 'INACTIVE';
}
