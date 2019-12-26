<?php

namespace App\Listeners;

use App\Events\ReplyAbsentRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailNotification
{
    const NAME = 'HR';

    private $absent;

    /**
     * Handle the event.
     *
     * @param  AbsentRequested  $event
     * @return void
     */
    public function handle(ReplyAbsentRequest $event)
    {
        $this->absent = $event->absent;

        $data = [
            'name' => $this->absent->user->name,
            'day' => $this->absent->day,
            'status' => $this->absent->status,
        ];
        Mail::send('emails.mail', $data, function($message) {
            $message->to($this->absent->user->email, $this->absent->user->name)
            ->subject('Manage Absent');
            $message->from(env('MAIL_USERNAME'), self::NAME);
        });
    }
}
