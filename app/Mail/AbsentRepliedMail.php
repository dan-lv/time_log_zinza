<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\AbsentRequest;

class AbsentRepliedMail extends Mailable
{
    use Queueable, SerializesModels;

    const NAME = 'HR';

    private $absent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AbsentRequest $absent)
    {
        $this->absent = $absent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),  self::NAME)
                    ->subject('Absent Request Notification')
                    ->view('emails.absentConfirm')
                    ->with([
                        'name' => $this->absent->user->name,
                        'day' => $this->absent->day,
                        'status' => $this->absent->status,
                    ]);
    }
}
