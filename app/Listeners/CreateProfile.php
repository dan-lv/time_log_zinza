<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Interfaces\ProfileInterface;
use App\Events\UserCreated;

class CreateProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $profileRepository;

    public function __construct(ProfileInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $this->profileRepository->createProfile($event);
    }
}
