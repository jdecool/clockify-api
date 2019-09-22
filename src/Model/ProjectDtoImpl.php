<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class ProjectDtoImpl
{
    private $archived;
    private $billable;
    private $clientId;
    private $clientName;
    private $color;
    private $duration;
    private $estimate;
    private $hourlyRate;
    private $id;
    private $memberships;
    private $name;
    private $public;
    private $workspaceId;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['archived'],
            $data['billable'],
            $data['clientId'],
            $data['clientName'],
            $data['color'],
            $data['duration'],
            EstimateDto::fromArray($data['estimate']),
            $data['hourlyRate'] ? HourlyRateDto::fromArray($data['hourlyRate']) : null,
            $data['id'],
            array_map(
                static function(array $membership): MembershipDto {
                    return MembershipDto::fromArray($membership);
                },
                $data['memberships']
            ),
            $data['name'],
            $data['public'],
            $data['workspaceId']
        );
    }

    /**
     * @param MembershipDto[] $memberships
     */
    public function __construct(
        bool $archived,
        bool $billable,
        string $clientId,
        string $clientName,
        string $color,
        string $duration,
        EstimateDto $estimate,
        ?HourlyRateDto $hourlyRate,
        string $id,
        array $memberships,
        string $name,
        bool $public,
        string $workspaceId
    ) {
        $this->archived = $archived;
        $this->billable = $billable;
        $this->clientId = $clientId;
        $this->clientName = $clientName;
        $this->color = $color;
        $this->duration = $duration;
        $this->estimate = $estimate;
        $this->hourlyRate = $hourlyRate;
        $this->id = $id;
        $this->memberships = $memberships;
        $this->name = $name;
        $this->public = $public;
        $this->workspaceId = $workspaceId;
    }

    public function archived(): bool
    {
        return $this->archived;
    }

    public function billable(): bool
    {
        return $this->billable;
    }

    public function clientId(): string
    {
        return $this->clientId;
    }

    public function clientName()
    {
        return $this->clientName;
    }

    public function color(): string
    {
        return $this->color;
    }

    public function duration(): string
    {
        return $this->duration;
    }

    public function estimate(): EstimateDto
    {
        return $this->estimate;
    }

    public function hourlyRate(): ?HourlyRateDto
    {
        return $this->hourlyRate;
    }

    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return MembershipDto[]
     */
    public function memberships(): array
    {
        return $this->memberships;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function public(): bool
    {
        return $this->public;
    }

    public function workspaceId(): string
    {
        return $this->workspaceId;
    }
}
