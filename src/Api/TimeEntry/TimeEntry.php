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

    public function createForUser(string $workspaceId, string $userId, TimeEntryRequest $request): TimeEntryDtoImpl
    {
        $data = $this->http->post("/workspaces/$workspaceId/user/$userId/time-entries", $request->toArray());

        return TimeEntryDtoImpl::fromArray($data);
    }

    public function update(string $workspaceId, string $id, UpdateTimeEntryRequest $request): TimeEntryDtoImpl
    {
        $data = $this->http->put("/workspaces/$workspaceId/time-entries/$id", $request->toArray());

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

    public function delete(string $workspaceId, string $id): void
    {
        $this->http->delete("/workspaces/$workspaceId/time-entries/$id");
    }

    public function stopRunningTime(string $workspaceId, string $userId, StopTimeEntryRequest $request): TimeEntryDtoImpl
    {
        $data = $this->http->patch("/workspaces/$workspaceId/user/$userId/time-entries", $request->toArray());

        return TimeEntryDtoImpl::fromArray($data);
    }

    public function find(string $workspaceId, string $userId, array $params = []): array
    {
        if (isset($params['description']) && !is_string($params['description'])) {
            throw new ClockifyException('Invalid "description" parameter');
        }

        if (isset($params['start']) && !is_string($params['start'])) {
            throw new ClockifyException('Invalid "start" parameter');
        }

        if (isset($params['end']) && !is_string($params['end'])) {
            throw new ClockifyException('Invalid "end" parameter');
        }

        if (isset($params['project']) && !is_string($params['project'])) {
            throw new ClockifyException('Invalid "project" parameter');
        }

        if (isset($params['task']) && !is_string($params['task'])) {
            throw new ClockifyException('Invalid "task" parameter');
        }

        if (isset($params['tags']) && !is_array($params['tags'])) {
            throw new ClockifyException('Invalid "tags" parameter');
        }

        if (isset($params['project-required']) && !is_bool($params['project-required'])) {
            throw new ClockifyException('Invalid "project-required" parameter');
        }

        if (isset($params['task-required']) && !is_bool($params['task-required'])) {
            throw new ClockifyException('Invalid "task-required" parameter');
        }

        if (isset($params['consider-duration-format']) && !is_bool($params['consider-duration-format'])) {
            throw new ClockifyException('Invalid "consider-duration-format" parameter');
        }

        if (isset($params['hydrated']) && !is_bool($params['hydrated'])) {
            throw new ClockifyException('Invalid "hydrated" parameter');
        }

        if (isset($params['in-progress']) && !is_bool($params['in-progress'])) {
            throw new ClockifyException('Invalid "in-progress" parameter');
        }

        if (isset($params['page']) && (!is_int($params['page']) || $params['page'] < 1)) {
            throw new ClockifyException('Invalid "page" parameter');
        }

        if (isset($params['page-size']) && (!is_int($params['page-size']) || $params['page-size'] < 1)) {
            throw new ClockifyException('Invalid "page-size" parameter');
        }

        $data = $this->http->get("/workspaces/$workspaceId/user/$userId/time-entries", $params);

        return array_map(
            static function(array $timeEntry): TimeEntryDtoImpl {
                return TimeEntryDtoImpl::fromArray($timeEntry);
            },
            $data
        );
    }
}
