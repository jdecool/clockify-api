<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

class TimeEntriesDurationRequest
{
    private $start;
    private $end;

    public function __construct(string $start, string $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function start(): string
    {
        return $this->start;
    }

    public function end(): string
    {
        return $this->end;
    }

    public function toArray(): array
    {
        return [
            'start' => $this->start,
            'end' => $this->end,
        ];
    }
}
