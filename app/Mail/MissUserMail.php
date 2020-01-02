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

    private $miss_timelog_users;
    private $miss_check_out_users;
    private $day;

    public function __construct($miss_timelog_users, $miss_check_out_users, $day)
    {
        $this->miss_timelog_users = $miss_timelog_users;
        $this->miss_check_out_users = $miss_check_out_users;
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
                        'miss_timelog_users' => $this->miss_timelog_users,
                        'miss_check_out_users' => $this->miss_check_out_users,
                        'day' => $this->day,
                    ]);
    }
}
