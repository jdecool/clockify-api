<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

class UpdateTimeEntryRequest
{
    private $start;
    private $billable;
    private $description;
    private $projectId;
    private $taskId;
    private $end;
    private $tagIds;

    /**
     * @param string[] $tagIds
     */
    public function __construct(
        string $start,
        bool $billable,
        string $description,
        string $projectId,
        string $taskId,
        string $end,
        array $tagIds
    ) {
        $this->start = $start;
        $this->billable = $billable;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->taskId = $taskId;
        $this->end = $end;
        $this->tagIds = $tagIds;
    }

    public function start(): string
    {
        return $this->start;
    }

    public function billable(): bool
    {
        return $this->billable;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function projectId(): string
    {
        return $this->projectId;
    }

    public function taskId(): string
    {
        return $this->taskId;
    }

    public function end(): string
    {
        return $this->end;
    }

    /**
     * @return string[]
     */
    public function tagIds(): array
    {
        return $this->tagIds;
    }

    public function toArray(): array
    {
        return [
            'start' => $this->start,
            'billable' => $this->billable,
            'description' => $this->description,
            'projectId' => $this->projectId,
            'taskId' => $this->taskId,
            'end' => $this->end,
            'tagIds' => $this->tagIds,
        ];
    }
}
