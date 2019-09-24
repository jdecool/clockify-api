<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

use JDecool\Clockify\{
    Client,
    Model\TimeEntryDtoImpl
};

class TimeEntry
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    public function create(string $workspaceId, TimeEntryRequest $request): TimeEntryDtoImpl
    {
        $data = $this->http->post(" /workspaces/$workspaceId/time-entries", $request->toArray());

        return TimeEntryDtoImpl::fromArray($data);
    }
}
