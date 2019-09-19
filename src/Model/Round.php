<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class Round
{
    private $minutes;
    private $round;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['minutes'],
            $data['round']
        );
    }

    public function __construct(string $minutes, string $round)
    {
        $this->minutes = $minutes;
        $this->round = $round;
    }

    public function minutes(): string
    {
        return $this->minutes;
    }

    public function round(): string
    {
        return $this->round;
    }
}
