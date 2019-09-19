<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class WorkspaceSettingsDto
{
    private $adminOnlyPages;
    private $automaticLock;
    private $canSeeTimeSheet;
    private $defaultBillableProjects;
    private $forceDescription;
    private $forceProjects;
    private $forceTags;
    private $forceTasks;
    private $lockTimeEntries;
    private $onlyAdminsCreateProject;
    private $onlyAdminsCreateTag;
    private $onlyAdminsSeeAllTimeEntries;
    private $onlyAdminsSeeBillableRates;
    private $onlyAdminsSeeDashboard;
    private $onlyAdminsSeePublicProjectsEntries;
    private $projectFavorites;
    private $projectGroupingLabel;
    private $projectPickerSpecialFilter;
    private $round;
    private $timeRoundingInReports;
    private $trackTimeDownToSecond;

    public static function fromArray(array $data): self
    {
        return new self(
            array_map(
                static function(string $page): PagesEnum {
                    return new PagesEnum($page);
                },
                $data['adminOnlyPages']
            ),
            $data['automaticLock'] ? AutomaticLockDto::fromArray($data['automaticLock']) : null,
            $data['canSeeTimeSheet'],
            $data['defaultBillableProjects'],
            $data['forceDescription'],
            $data['forceProjects'],
            $data['forceTags'],
            $data['forceTasks'],
            $data['lockTimeEntries'],
            $data['onlyAdminsCreateProject'],
            $data['onlyAdminsCreateTag'],
            $data['onlyAdminsSeeAllTimeEntries'],
            $data['onlyAdminsSeeBillableRates'],
            $data['onlyAdminsSeeDashboard'],
            $data['onlyAdminsSeePublicProjectsEntries'],
            $data['projectFavorites'],
            $data['projectGroupingLabel'],
            $data['projectPickerSpecialFilter'],
            Round::fromArray($data['round']),
            $data['timeRoundingInReports'],
            $data['trackTimeDownToSecond']
        );
    }

    /**
     * @param PagesEnum[] $adminOnlyPages
     */
    public function __construct(
        array $adminOnlyPages,
        ?AutomaticLockDto $automaticLock,
        bool $canSeeTimeSheet,
        bool $defaultBillableProjects,
        bool $forceDescription,
        bool $forceProjects,
        bool $forceTags,
        bool $forceTasks,
        ?string $lockTimeEntries,
        bool $onlyAdminsCreateProject,
        bool $onlyAdminsCreateTag,
        bool $onlyAdminsSeeAllTimeEntries,
        bool $onlyAdminsSeeBillableRates,
        bool $onlyAdminsSeeDashboard,
        bool $onlyAdminsSeePublicProjectsEntries,
        bool $projectFavorites,
        string $projectGroupingLabel,
        bool $projectPickerSpecialFilter,
        Round $round,
        bool $timeRoundingInReports,
        bool $trackTimeDownToSecond
    ) {
        $this->adminOnlyPages = $adminOnlyPages;
        $this->automaticLock = $automaticLock;
        $this->canSeeTimeSheet = $canSeeTimeSheet;
        $this->defaultBillableProjects = $defaultBillableProjects;
        $this->forceDescription = $forceDescription;
        $this->forceProjects = $forceProjects;
        $this->forceTags = $forceTags;
        $this->forceTasks = $forceTasks;
        $this->lockTimeEntries = $lockTimeEntries;
        $this->onlyAdminsCreateProject = $onlyAdminsCreateProject;
        $this->onlyAdminsCreateTag = $onlyAdminsCreateTag;
        $this->onlyAdminsSeeAllTimeEntries = $onlyAdminsSeeAllTimeEntries;
        $this->onlyAdminsSeeBillableRates = $onlyAdminsSeeBillableRates;
        $this->onlyAdminsSeeDashboard = $onlyAdminsSeeDashboard;
        $this->onlyAdminsSeePublicProjectsEntries = $onlyAdminsSeePublicProjectsEntries;
        $this->projectFavorites = $projectFavorites;
        $this->projectGroupingLabel = $projectGroupingLabel;
        $this->projectPickerSpecialFilter = $projectPickerSpecialFilter;
        $this->round = $round;
        $this->timeRoundingInReports = $timeRoundingInReports;
        $this->trackTimeDownToSecond = $trackTimeDownToSecond;
    }

    /**
     * @return PagesEnum[]
     */
    public function adminOnlyPages(): array
    {
        return $this->adminOnlyPages;
    }

    public function automaticLock(): ?AutomaticLockDto
    {
        return $this->automaticLock;
    }

    public function canSeeTimeSheet(): bool
    {
        return $this->canSeeTimeSheet;
    }

    public function defaultBillableProjects(): bool
    {
        return $this->defaultBillableProjects;
    }

    public function forceDescription(): bool
    {
        return $this->forceDescription;
    }

    public function forceProjects(): bool
    {
        return $this->forceProjects;
    }

    public function forceTags(): bool
    {
        return $this->forceTags;
    }

    public function forceTasks(): bool
    {
        return $this->forceTasks;
    }

    public function lockTimeEntries(): ?string
    {
        return $this->lockTimeEntries;
    }

    public function onlyAdminsCreateProject(): bool
    {
        return $this->onlyAdminsCreateProject;
    }

    public function onlyAdminsCreateTag(): bool
    {
        return $this->onlyAdminsCreateTag;
    }

    public function onlyAdminsSeeAllTimeEntries(): bool
    {
        return $this->onlyAdminsSeeAllTimeEntries;
    }

    public function onlyAdminsSeeBillableRates(): bool
    {
        return $this->onlyAdminsSeeBillableRates;
    }

    public function onlyAdminsSeeDashboard(): bool
    {
        return $this->onlyAdminsSeeDashboard;
    }

    public function onlyAdminsSeePublicProjectsEntries(): bool
    {
        return $this->onlyAdminsSeePublicProjectsEntries;
    }

    public function projectFavorites(): bool
    {
        return $this->projectFavorites;
    }

    public function projectGroupingLabel(): string
    {
        return $this->projectGroupingLabel;
    }

    public function projectPickerSpecialFilter(): bool
    {
        return $this->projectPickerSpecialFilter;
    }

    public function round(): Round
    {
        return $this->round;
    }

    public function timeRoundingInReports(): bool
    {
        return $this->timeRoundingInReports;
    }

    public function trackTimeDownToSecond(): bool
    {
        return $this->trackTimeDownToSecond;
    }
}
