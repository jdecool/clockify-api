<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class TimeEntryDtoImpl
{
    private $billable;
    private $description;
    private $id;
    private $isLocked;
    private $projectId;
    private $tagIds;
    private $taskId;
    private $timeInterval;
    private $userId;
    private $workspaceId;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['billable'],
            $data['description'],
            $data['id'],
            $data['isLocked'],
            $data['projectId'] ? $data['projectId'] : '',
            $data['tagIds'] ? $data['tagIds'] : array(),
            $data['taskId'] ? $data['taskId'] : '',
            TimeIntervalDto::fromArray($data['timeInterval']),
            $data['userId'],
            $data['workspaceId']
        );
    }

    /**
     * @param string[] $tagIds
     */
    public function __construct(
        bool $billable,
        string $description,
        string $id,
        bool $isLocked,
        string $projectId,
        array $tagIds,
        string $taskId,
        TimeIntervalDto $timeInterval,
        string $userId,
        string $workspaceId
    ) {
        $this->billable = $billable;
        $this->description = $description;
        $this->id = $id;
        $this->isLocked = $isLocked;
        $this->projectId = $projectId;
        $this->tagIds = $tagIds;
        $this->taskId = $taskId;
        $this->timeInterval = $timeInterval;
        $this->userId = $userId;
        $this->workspaceId = $workspaceId;
    }

    public function billable(): bool
    {
        return $this->billable;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function isLocked(): bool
    {
        return $this->isLocked;
    }

    public function projectId(): string
    {
        return $this->projectId;
    }

    /**
     * @return string[]
     */
    public function tagIds()
    {
        return $this->tagIds;
    }

    public function taskId(): string
    {
        return $this->taskId;
    }

    public function timeInterval(): TimeIntervalDto
    {
        return $this->timeInterval;
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function workspaceId(): string
    {
        return $this->workspaceId;
    }
}
