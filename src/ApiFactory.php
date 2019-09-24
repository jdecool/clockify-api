<?php

declare(strict_types=1);

namespace JDecool\Clockify;

use JDecool\Clockify\{
    Api\Client\Client as ClientApi,
    Api\Project\Project,
    Api\Tag\Tag,
    Api\Task\Task,
    Api\User\User,
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

    public function projectApi(): Project
    {
        return new Project($this->client);
    }

    public function tagApi(): Tag
    {
        return new Tag($this->client);
    }

    public function taskApi(): Task
    {
        return new Task($this->client);
    }

    public function userApi(): User
    {
        return new User($this->client);
    }

    public function workspaceApi(): Workspace
    {
        return new Workspace($this->client);
    }
}
