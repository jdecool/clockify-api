<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class EstimateDto
{
    private $estimate;
    private $type;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['estimate'],
            new EstimateType($data['type'])
        );
    }

    public function __construct(string $estimate, EstimateType $type)
    {
        $this->estimate = $estimate;
        $this->type = $type;
    }

    public function estimate(): string
    {
        return $this->estimate;
    }

    public function type(): EstimateType
    {
        return $this->type;
    }
}
