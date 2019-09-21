<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Workspace;

use JDecool\Clockify\{
    Client,
    Model\WorkspaceDto
};

class Workspace
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * @return WorkspaceDto[]
     */
    public function workspaces(): array
    {
        $data = $this->http->get('/workspaces');

        return array_map(
            static function(array $workspace): WorkspaceDto {
                return WorkspaceDto::fromArray($workspace);
            },
            $data
        );
    }

    public function create(WorkspaceRequest $request): WorkspaceDto
    {
        $data = $this->http->post('/workspaces', $request->toArray());

        return WorkspaceDto::fromArray($data);
    }
}
