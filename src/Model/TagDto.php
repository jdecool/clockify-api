<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class TagDto
{
    private $id;
    private $name;
    private $workspaceId;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['workspaceId']
        );
    }

    public function __construct(string $id, string $name, string $workspaceId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->workspaceId = $workspaceId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function workspaceId(): string
    {
        return $this->workspaceId;
    }
}
