<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class MembershipDto
{
    private $hourlyRate;
    private $membershipStatus;
    private $membershipType;
    private $targetId;
    private $userId;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['hourlyRate'] ? HourlyRateDto::fromArray($data['hourlyRate']) : null,
            new MembershipEnum($data['membershipStatus']),
            $data['membershipType'],
            $data['targetId'],
            $data['userId']
        );
    }

    public function __construct(
        ?HourlyRateDto $hourlyRate,
        MembershipEnum $membershipStatus,
        string $membershipType,
        string $targetId,
        string $userId
    ) {
        $this->hourlyRate = $hourlyRate;
        $this->membershipStatus = $membershipStatus;
        $this->membershipType = $membershipType;
        $this->targetId = $targetId;
        $this->userId = $userId;
    }

    public function hourlyRate(): ?HourlyRateDto
    {
        return $this->hourlyRate;
    }

    public function membershipStatus(): MembershipEnum
    {
        return $this->membershipStatus;
    }

    public function membershipType(): string
    {
        return $this->membershipType;
    }

    public function targetId(): string
    {
        return $this->targetId;
    }

    public function userId(): string
    {
        return $this->userId;
    }
}
