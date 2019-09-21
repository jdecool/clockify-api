<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\Task;

class TaskRequest
{
    private $id;
    private $name;
    private $assigneeId;
    private $estimate;
    private $status;

    public function __construct(string $id, string $name, string $assigneeId, string $estimate, string $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->assigneeId = $assigneeId;
        $this->estimate = $estimate;
        $this->status = $status;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function assigneeId(): string
    {
        return $this->assigneeId;
    }

    public function estimate(): string
    {
        return $this->estimate;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'assigneeId' => $this->assigneeId,
            'estimate' => $this->estimate,
            'status' => $this->status,
        ];
    }
}
