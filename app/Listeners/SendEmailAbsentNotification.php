<?php

namespace App\Listeners;

use App\Events\AbsentRequested;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailAbsentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AbsentRequested  $event
     * @return void
     */
    public function handle(AbsentRequested $event)
    {
        
    }
}
