<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

use DateTimeImmutable;

class TimeIntervalDto
{
    private $duration;
    private $end;
    private $start;

    public static function fromArray(array $data): self
    {
        return new self(
            new DateTimeImmutable($data['start']),
            new DateTimeImmutable($data['end']),
            $data['duration']
        );
    }

    public function __construct(
        DateTimeImmutable $start,
        DateTimeImmutable $end,
        string $duration
    ) {
        $this->duration = $duration;
        $this->start = $start;
        $this->end = $end;
    }

    public function duration(): string
    {
        return $this->duration;
    }

    public function end(): DateTimeImmutable
    {
        return $this->end;
    }

    public function start(): DateTimeImmutable
    {
        return $this->start;
    }
}
