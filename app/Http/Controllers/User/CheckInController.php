<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;

class CheckInController extends Controller
{
    private $timeLogRepository;

    public function __construct(TimeLogInterface $timeLogRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
    }

    public function store()
    {
        $checkTimeLog = $this->timeLogRepository->getTimeLogToday();
        

        if (!$checkTimeLog) {
            $this->timeLogRepository->setCheckIn();

            return redirect('/')->with('status', trans('time_log.check_in_success'));
        } else {
            return redirect('/')->with('status', trans('time_log.check_in_fail'));
        }
    }
}
