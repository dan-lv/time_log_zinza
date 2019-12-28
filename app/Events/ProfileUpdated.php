<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Profile;

class ProfileUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $profile;
    public $fieldDiff;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Profile $profile, array $fieldDiff)
    {
        $this->profile = $profile;
        $this->fieldDiff = $fieldDiff;
    }
}
