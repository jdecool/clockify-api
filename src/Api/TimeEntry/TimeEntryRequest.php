<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

class TimeEntryRequest
{
    private $id;
    private $start;
    private $billable;
    private $description;
    private $projectId;
    private $userId;
    private $taskId;
    private $end;
    private $tagIds;
    private $timeInterval;
    private $workspaceId;
    private $isLocked;

    /**
     * @param string[] $tagIds
     */
    public function __construct(
        string $id,
        string $start,
        bool $billable,
        string $description,
        string $projectId,
        string $userId,
        string $taskId,
        string $end,
        array $tagIds,
        TimeEntriesDurationRequest $timeInterval,
        string $workspaceId,
        bool $isLocked
    ) {
        $this->id = $id;
        $this->start = $start;
        $this->billable = $billable;
        $this->description = $description;
        $this->projectId = $projectId;
        $this->userId = $userId;
        $this->taskId = $taskId;
        $this->end = $end;
        $this->tagIds = $tagIds;
        $this->timeInterval = $timeInterval;
        $this->workspaceId = $workspaceId;
        $this->isLocked = $isLocked;
    }

    public function id(): string
    {
        return $this->id;
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

    public function userId(): string
    {
        return $this->userId;
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

    public function timeInterval(): TimeEntriesDurationRequest
    {
        return $this->timeInterval;
    }

    public function workspaceId(): string
    {
        return $this->workspaceId;
    }

    public function isLocked(): bool
    {
        return $this->isLocked;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'start' => $this->start,
            'billable' => $this->billable,
            'description' => $this->description,
            'projectId' => $this->projectId,
            'userId' => $this->userId,
            'taskId' => $this->taskId,
            'end' => $this->end,
            'tagIds' => $this->tagIds,
            'timeInterval' => $this->timeInterval->toArray(),
            'workspaceId' => $this->workspaceId,
            'isLocked' => $this->isLocked,
        ];
    }
}
