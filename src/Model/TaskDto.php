<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class TaskDto
{
    private $assigneeId;
    private $estimate;
    private $id;
    private $name;
    private $projectId;
    private $status;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['assigneeId'],
            $data['estimate'],
            $data['id'],
            $data['name'],
            $data['projectId'],
            new TaskStatus($data['status']),
        );
    }

    public function __construct(
        string $assigneeId,
        string $estimate,
        string $id,
        string $name,
        string $projectId,
        TaskStatus $status
    ) {
        $this->assigneeId = $assigneeId;
        $this->estimate = $estimate;
        $this->id = $id;
        $this->name = $name;
        $this->projectId = $projectId;
        $this->status = $status;
    }

    public function assigneeId(): string
    {
        return $this->assigneeId;
    }

    public function estimate(): string
    {
        return $this->estimate;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function projectId(): string
    {
        return $this->projectId;
    }

    public function status(): TaskStatus
    {
        return $this->status;
    }
}
