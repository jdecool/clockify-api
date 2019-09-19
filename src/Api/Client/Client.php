<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Client;

use JDecool\Clockify\Client as Http;
use JDecool\Clockify\Exception\ClockifyException;
use JDecool\Clockify\Model\ClientDto;

class Client
{
    private $http;

    public function __construct(Http $http)
    {
        $this->http = $http;
    }

    /**
     * @return ClientDto[]
     */
    public function clients(string $workspaceId, array $params = []): array
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

        $data = $this->http->get("/workspaces/$workspaceId/clients", $params);

        return array_map(
            static function(array $client): ClientDto {
                return ClientDto::fromArray($client);
            },
            $data
        );
    }

    public function createClient(string $workspaceId, ClientRequest $request): ClientDto
    {
        $data = $this->http->post("/workspaces/$workspaceId/clients", $request->toArray());

        return ClientDto::fromArray($data);
    }
}
