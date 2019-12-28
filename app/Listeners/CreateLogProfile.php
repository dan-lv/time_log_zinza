<?php

namespace App\Listeners;

use App\Events\ProfileUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\LogProfileRepository;

class CreateLogProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $logProfileRepository;

    public function __construct(LogProfileRepository $logProfileRepository)
    {
        $this->logProfileRepository = $logProfileRepository;
    }

    /**
     * Handle the event.
     *
     * @param  ProfileUpdated  $event
     * @return void
     */
    public function handle(ProfileUpdated $event)
    {
        $this->logProfileRepository->createLog($event->profile->user_id, $event->fieldDiff);
    }
}
