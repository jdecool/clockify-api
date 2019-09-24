<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class UserSettingsDto
{
    private $collapseAllProjectLists;
    private $dashboardPinToTop;
    private $dashboardSelection;
    private $dashboardViewType;
    private $dateFormat;
    private $isCompactViewOn;
    private $longRunning;
    private $projectListCollapse;
    private $sendNewsletter;
    private $summaryReportSettings;
    private $timeFormat;
    private $timeTrackingManual;
    private $timeZone;
    private $weekStart;
    private $weeklyUpdates;

    public static function fromArray(array $data): self
    {
        return new self(
            $data['collapseAllProjectLists'],
            $data['dashboardPinToTop'],
            new DashboardSelection($data['dashboardSelection']),
            new DashboardViewType($data['dashboardViewType']),
            $data['dateFormat'],
            $data['isCompactViewOn'],
            $data['longRunning'],
            $data['projectListCollapse'],
            $data['sendNewsletter'],
            SummaryReportSettingsDto::fromArray($data['summaryReportSettings']),
            $data['timeFormat'],
            $data['timeTrackingManual'],
            $data['timeZone'],
            new DaysEnum($data['weekStart']),
            $data['weeklyUpdates']
        );
    }

    public function __construct(
        bool $collapseAllProjectLists,
        bool $dashboardPinToTop,
        DashboardSelection $dashboardSelection,
        DashboardViewType $dashboardViewType,
        string $dateFormat,
        bool $isCompactViewOn,
        bool $longRunning,
        int $projectListCollapse,
        bool $sendNewsletter,
        SummaryReportSettingsDto $summaryReportSettings,
        string $timeFormat,
        bool $timeTrackingManual,
        string $timeZone,
        DaysEnum $weekStart,
        bool $weeklyUpdates
    ) {
        $this->collapseAllProjectLists = $collapseAllProjectLists;
        $this->dashboardPinToTop = $dashboardPinToTop;
        $this->dashboardSelection = $dashboardSelection;
        $this->dashboardViewType = $dashboardViewType;
        $this->dateFormat = $dateFormat;
        $this->isCompactViewOn = $isCompactViewOn;
        $this->longRunning = $longRunning;
        $this->projectListCollapse = $projectListCollapse;
        $this->sendNewsletter = $sendNewsletter;
        $this->summaryReportSettings = $summaryReportSettings;
        $this->timeFormat = $timeFormat;
        $this->timeTrackingManual = $timeTrackingManual;
        $this->timeZone = $timeZone;
        $this->weekStart = $weekStart;
        $this->weeklyUpdates = $weeklyUpdates;
    }

    public function collapseAllProjectLists(): bool
    {
        return $this->collapseAllProjectLists;
    }

    public function dashboardPinToTop(): bool
    {
        return $this->dashboardPinToTop;
    }

    public function dashboardSelection(): DashboardSelection
    {
        return $this->dashboardSelection;
    }

    public function dashboardViewType(): DashboardViewType
    {
        return $this->dashboardViewType;
    }

    public function dateFormat(): string
    {
        return $this->dateFormat;
    }

    public function isCompactViewOn(): bool
    {
        return $this->isCompactViewOn;
    }

    public function longRunning(): bool
    {
        return $this->longRunning;
    }

    public function projectListCollapse(): int
    {
        return $this->projectListCollapse;
    }

    public function sendNewsletter(): bool
    {
        return $this->sendNewsletter;
    }

    public function summaryReportSettings(): SummaryReportSettingsDto
    {
        return $this->summaryReportSettings;
    }

    public function timeFormat(): string
    {
        return $this->timeFormat;
    }

    public function timeTrackingManual(): bool
    {
        return $this->timeTrackingManual;
    }

    public function timeZone(): string
    {
        return $this->timeZone;
    }

    public function weekStart(): DaysEnum
    {
        return $this->weekStart;
    }

    public function weeklyUpdates(): bool
    {
        return $this->weeklyUpdates;
    }
}
