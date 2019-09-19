<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Client;

class ClientRequest
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
