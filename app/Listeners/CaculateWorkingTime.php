<?php

namespace App\Listeners;

use App\Events\TimeLogCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Interfaces\TimeLogInterface;

class CaculateWorkingTime implements ShouldQueue
{
    private $timeLogRepository;

    public function __construct(TimeLogInterface $timeLogRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
    }

    /**
     * Handle the event.
     *
     * @param  TimeLogCreated  $event
     * @return void
     */
    public function handle(TimeLogCreated $event)
    {
        $this->timeLogRepository->caculateWorkingTime();
    }
}
