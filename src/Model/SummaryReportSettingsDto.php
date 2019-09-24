<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class SummaryReportSettingsDto
{
    private $group;
    private $subgroup;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['group'],
            $data['subgroup']
        );
    }

    public function __construct(string $group, string $subgroup)
    {
        $this->group = $group;
        $this->subgroup = $subgroup;
    }

    public function group(): string
    {
        return $this->group;
    }

    public function subgroup(): string
    {
        return $this->subgroup;
    }
}
