<?php

declare(strict_types=1);

namespace JDecool\Clockify\Api\TimeEntry;

class StopTimeEntryRequest
{
    private $end;

    public function __construct(string $end)
    {
        $this->end = $end;
    }

    public function end(): string
    {
        return $this->end;
    }

    public function toArray(): array
    {
        return [
            'end' => $this->end,
        ];
    }
}
