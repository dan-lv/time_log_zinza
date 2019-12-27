<?php

namespace App\Listeners;

use App\Events\AbsentReplied;
use Mail;
use App\Mail\AbsentRepliedMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNotification implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  AbsentRequested  $event
     * @return void
     */
    public function handle(AbsentReplied $event)
    {
        Mail::send(new AbsentRepliedMail($event->absent));
    }
}
