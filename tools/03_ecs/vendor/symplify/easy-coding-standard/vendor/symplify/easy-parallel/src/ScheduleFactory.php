<?php

declare (strict_types=1);
namespace ECSPrefix20220220\Symplify\EasyParallel;

use ECSPrefix20220220\Symplify\EasyParallel\ValueObject\Schedule;
/**
 * Used from
 * https://github.com/phpstan/phpstan-src/blob/9124c66dcc55a222e21b1717ba5f60771f7dda92/src/Parallel/Scheduler.php
 */
final class ScheduleFactory
{
    /**
     * @param array<string> $files
     */
    public function create(int $cpuCores, int $jobSize, int $maxNumberOfProcesses, array $files) : \ECSPrefix20220220\Symplify\EasyParallel\ValueObject\Schedule
    {
        $jobs = \array_chunk($files, $jobSize);
        $numberOfProcesses = \min(\count($jobs), $cpuCores);
        $numberOfProcesses = \min($maxNumberOfProcesses, $numberOfProcesses);
        return new \ECSPrefix20220220\Symplify\EasyParallel\ValueObject\Schedule($numberOfProcesses, $jobs);
    }
}
