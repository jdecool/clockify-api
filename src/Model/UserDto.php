<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class UserDto
{
    private $activeWorkspace;
    private $defaultWorkspace;
    private $email;
    private $id;
    private $memberships;
    private $name;
    private $profilePicture;
    private $settings;
    private $status;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['activeWorkspace'] ? $data['activeWorkspace'] : '',
            $data['defaultWorkspace'] ? $data['defaultWorkspace'] : '',
            $data['email'],
            $data['id'],
            array_map(
                static function(array $membership): MembershipDto {
                    return MembershipDto::fromArray($membership);
                },
                $data['memberships']
            ),
            $data['name'] ? $data['name'] : '',
            $data['profilePicture'] ? $data['profilePicture'] : '',
            $data['settings'] ? UserSettingsDto::fromArray($data['settings']) : null,
            new UserStatus($data['status'])
        );
    }

    /**
     * @param MembershipDto[] $memberships
     */
    public function __construct(
        string $activeWorkspace,
        string $defaultWorkspace,
        string $email,
        string $id,
        array $memberships,
        string $name,
        string $profilePicture,
        ?UserSettingsDto $settings,
        UserStatus $status
    ) {
        $this->activeWorkspace = $activeWorkspace;
        $this->defaultWorkspace = $defaultWorkspace;
        $this->email = $email;
        $this->id = $id;
        $this->memberships = $memberships;
        $this->name = $name;
        $this->profilePicture = $profilePicture;
        $this->settings = $settings;
        $this->status = $status;
    }

    public function activeWorkspace(): string
    {
        return $this->activeWorkspace;
    }

    public function defaultWorkspace(): string
    {
        return $this->defaultWorkspace;
    }

    public function email(): string
    {
        return $this->email;
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

    public function profilePicture(): string
    {
        return $this->profilePicture;
    }

    public function settings(): ?UserSettingsDto
    {
        return $this->settings;
    }

    public function status(): UserStatus
    {
        return $this->status;
    }
}
