<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MissUserMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    const NAME = 'HR';

    private $users;
    private $day;

    public function __construct($users, $day)
    {
        $this->users = $users;
        $this->day = $day;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), self::NAME)
                    ->subject('User Miss TimeLog')
                    ->to(env('MAIL_USERNAME'), self::NAME)
                    ->view('emails.miss_user')
                    ->with([
                        'users' => $this->users,
                        'day' => $this->day,
                    ]);
    }
}
