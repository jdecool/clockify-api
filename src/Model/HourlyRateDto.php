<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class HourlyRateDto
{
    private $amount;
    private $currency;

    public static function fromArray(array $data): self
    {
        return new self($data['amount'], $data['currency']);
    }

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
