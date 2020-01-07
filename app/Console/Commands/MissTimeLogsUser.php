<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\MissUserMail;
use App\Services\UserService;

class MissTimeLogsUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:miss-timelog';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Notification To User Who Missed TimeLog';

    private $userService;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        parent::__construct();

        $this->userService = $userService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::send(new MissUserMail($this->userService->getMissTimeLogUser(), $this->userService->getMissCheckOutUser(), $this->userService->getDateToday()));
    }
}
