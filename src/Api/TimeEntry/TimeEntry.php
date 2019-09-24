<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

use JDecool\Clockify\Client;

class TimeEntry
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }
}
