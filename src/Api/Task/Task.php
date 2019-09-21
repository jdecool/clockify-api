<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Task;

use JDecool\Clockify\Client;
use JDecool\Clockify\Exception\ClockifyException;
use JDecool\Clockify\Model\TaskDto;

class Task
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * @return TaskDto[]
     */
    public function tasks(string $workspaceId, string $projectId, array $params = []): array
    {
        if (isset($params['is-active']) && !is_bool($params['is-active'])) {
            throw new ClockifyException('Invalid "is-active" parameter (should be a boolean value)');
        }

        if (isset($params['name']) && empty($params['name'])) {
            throw new ClockifyException('Invalid "name" parameter');
        }

        if (isset($params['page']) && (!is_int($params['page']) || $params['page'] < 1)) {
            throw new ClockifyException('Invalid "page" parameter');
        }

        if (isset($params['page-size']) && (!is_int($params['page-size']) || $params['page-size'] < 1)) {
            throw new ClockifyException('Invalid "page-size" parameter');
        }

        $data = $this->http->get("/workspaces/$workspaceId/projects/$projectId/tasks", $params);

        return array_map(
            static function(array $task): TaskDto {
                return TaskDto::fromArray($task);
            },
            $data
        );
    }

    public function createTask(string $workspaceId, string $projectId, TaskRequest $request): TaskDto
    {
        $data = $this->http->post("/workspaces/$workspaceId/projects/$projectId/tasks", $request->toArray());

        return TaskDto::fromArray($data);
    }
}
