<?php

declare(strict_types=1);

namespace JDecool\Clockify\Model;

class AutomaticLockDto
{
    private $changeDay;
    private $dayOfMonth;
    private $firstDay;
    private $olderThanPeriod;
    private $olderThanValue;
    private $type;

    public static function fromArray(array $data): self
    {
        return new self(
            new DaysEnum($data['changeDay']),
            $data['dayOfMonth'],
            new DaysEnum($data['firstDay']),
            new PeriodEnum($data['olderThanPeriod']),
            $data['olderThanValue'],
            new AutomaticLockEnum($data['type'])
        );
    }

    public function __construct(
        DaysEnum $changeDay,
        int $dayOfMonth,
        DaysEnum $firstDay,
        PeriodEnum $olderThanPeriod,
        int $olderThanValue,
        AutomaticLockEnum $type
    ) {
        $this->changeDay = $changeDay;
        $this->dayOfMonth = $dayOfMonth;
        $this->firstDay = $firstDay;
        $this->olderThanPeriod = $olderThanPeriod;
        $this->olderThanValue = $olderThanValue;
        $this->type = $type;
    }

    public function changeDay(): DaysEnum
    {
        return $this->changeDay;
    }

    public function dayOfMonth(): int
    {
        return $this->dayOfMonth;
    }

    public function firstDay(): DaysEnum
    {
        return $this->firstDay;
    }

    public function olderThanPeriod(): PeriodEnum
    {
        return $this->olderThanPeriod;
    }

    public function olderThanValue(): int
    {
        return $this->olderThanValue;
    }

    public function type(): AutomaticLockEnum
    {
        return $this->type;
    }
}
