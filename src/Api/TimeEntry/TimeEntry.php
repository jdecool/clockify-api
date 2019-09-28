<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

use JDecool\Clockify\{
    Client,
    Exception\ClockifyException,
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
        $data = $this->http->post("/workspaces/$workspaceId/time-entries", $request->toArray());

        return TimeEntryDtoImpl::fromArray($data);
    }

    public function entry(string $workspaceId, string $id, array $params = []): TimeEntryDtoImpl
    {
        if (isset($params['consider-duration-format']) && !is_bool($params['consider-duration-format'])) {
            throw new ClockifyException('Invalid "consider-duration-format" parameter (should be a boolean value)');
        }

        if (isset($params['hydrated']) && !is_bool($params['hydrated'])) {
            throw new ClockifyException('Invalid "hydrated" parameter (should be a boolean value)');
        }

        $data = $this->http->get("/workspaces/$workspaceId/time-entries/$id", $params);

        return TimeEntryDtoImpl::fromArray($data);
    }
}
