<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class WorkspaceDto
{
    private $hourlyRate;
    private $id;
    private $imageUrl;
    private $memberships;
    private $name;
    private $workspaceSettings;

    public static function fromArray(array $data): self
    {
        return new self(
            HourlyRateDto::fromArray($data['hourlyRate']),
            $data['id'],
            $data['imageUrl'],
            array_map(
                static function(array $data): MembershipDto {
                    return MembershipDto::fromArray($data);
                },
                $data['memberships']
            ),
            $data['name'],
            WorkspaceSettingsDto::fromArray($data['workspaceSettings'])
        );
    }

    /**
     * @param MembershipDto[] $memberships
     */
    public function __construct(
        ?HourlyRateDto $hourlyRate,
        string $id,
        string $imageUrl,
        array $memberships,
        string $name,
        WorkspaceSettingsDto $workspaceSettings
    ) {
        $this->hourlyRate = $hourlyRate;
        $this->id = $id;
        $this->imageUrl = $imageUrl;
        $this->memberships = $memberships;
        $this->name = $name;
        $this->workspaceSettings = $workspaceSettings;
    }

    public function hourlyRate(): ?HourlyRateDto
    {
        return $this->hourlyRate;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function imageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return MembershipDto[]
     */
    public function memberships()
    {
        return $this->memberships;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function workspaceSettings(): WorkspaceSettingsDto
    {
        return $this->workspaceSettings;
    }
}
