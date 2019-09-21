<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Tag;

use JDecool\Clockify\{
    Client,
    Exception\ClockifyException,
    Model\TagDto
};

class Tag
{
    private $http;

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    /**
     * @return TagDto[]
     */
    public function tags(string $workspaceId, array $params = []): array
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

        $data = $this->http->get("/workspaces/$workspaceId/tags", $params);

        return array_map(
            static function(array $tag): TagDto {
                return TagDto::fromArray($tag);
            },
            $data
        );
    }

    public function create(string $workspaceId, TagRequest $request): TagDto
    {
        $data = $this->http->post("/workspaces/$workspaceId/tags", $request->toArray());

        return TagDto::fromArray($data);
    }
}
