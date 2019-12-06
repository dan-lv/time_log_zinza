<?php

namespace App\Listeners;

use App\Events\SendedAbsentRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailAbsentNotification implements ShouldQueue
{
    const EMAIL = 'nhudanmkt@gmail.com';
    const NAME = 'HR';

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
    public function handle(SendedAbsentRequest $event)
    {
        $nameUser = $event->absent->user->name;
        $data = ['name' => $nameUser, 'body' => 'Send a request absent'];

        Mail::send('emails.mail', $data, function($message) {
            $message->to(self::EMAIL, self::NAME)
            ->subject('Manage Absent');
            $message->from('dandn.intern@gmail.com', 'New Absent');
        });
    }
}
