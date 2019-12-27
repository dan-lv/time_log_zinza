<?php

namespace App\Listeners;

use App\Events\AbsentReplied;
use Mail;
use App\Mail\AbsentRepliedMail;

class SendEmailNotification
{
    /**
     * Handle the event.
     *
     * @param  AbsentRequested  $event
     * @return void
     */
    public function handle(AbsentReplied $event)
    {
        Mail::to($event->user)->send(new AbsentRepliedMail($event->absent));
    }
}
