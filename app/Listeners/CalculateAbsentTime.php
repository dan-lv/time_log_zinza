<?php

namespace App\Listeners;

use App\Events\AbsentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Interfaces\AbsentInterface;

class CalculateAbsentTime implements ShouldQueue
{
    private $absentRequestRepository;

    public function __construct(AbsentInterface $absentRequestRepository)
    {
        $this->absentRequestRepository = $absentRequestRepository;
    }

    /**
     * Handle the event.
     *
     * @param  TimeLogCreated  $event
     * @return void
     */
    public function handle(AbsentCreated $event)
    {
        $this->absentRequestRepository->calculateAbsentTime();
    }
}
