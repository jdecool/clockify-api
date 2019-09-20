<?php

declare(strict_types=1);

namespace JDecool\Clockify;

use JDecool\Clockify\{
    Api\Client\Client as ClientApi,
    Api\Tag\Tag,
    Api\Workspace\Workspace
};

class ApiFactory
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function clientApi(): ClientApi
    {
        return new ClientApi($this->client);
    }

    public function tagApi(): Tag
    {
        return new Tag($this->client);
    }

    public function workspaceApi(): Workspace
    {
        return new Workspace($this->client);
    }
}
