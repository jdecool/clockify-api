<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Project;

use JDecool\Clockify\{
    Client,
    Exception\ClockifyException,
    Model\ProjectDtoImpl
};

class Project
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * @return ProjectDtoImpl|]
     */
    public function projects(string $workspaceId, array $params = []): array
    {
        if (isset($params['name']) && empty($params['name'])) {
            throw new ClockifyException('Invalid "name" parameter');
        }

        if (isset($params['page']) && (!is_int($params['page']) || $params['page'] < 1)) {
            throw new ClockifyException('Invalid "page" parameter');
        }

        if (isset($params['page-size']) && (!is_int($params['page-size']) || $params['page-size'] < 1)) {
            throw new ClockifyException('Invalid "page-size" parameter');
        }

        $data = $this->http->get("/workspaces/$workspaceId/projects", $params);

        return array_map(
            static function(array $project): ProjectDtoImpl {
                return ProjectDtoImpl::fromArray($project);
            },
            $data
        );
    }

    public function createProject(string $workspaceId, ProjectRequest $request): ProjectDtoImpl
    {
        $data = $this->http->post(" /workspaces/$workspaceId/projects", $request->toArray());

        return ProjectDtoImpl::fromArray($data);
    }

    public function deleteProject(string $workspaceId, string $projectId): void
    {
        $this->http->delete("/workspaces/$workspaceId/projects/$projectId");
    }
}
