<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;

class CheckInController extends Controller
{
    private $TimeLogRepository;

    public function __construct(TimeLogInterface $TimeLogRepository)
    {
        $this->TimeLogRepository = $TimeLogRepository;
    }

    public function store()
    {
        $check_time_log = $this->TimeLogRepository->getTimeLogToDay();

        if (!$check_time_log) {
            $this->TimeLogRepository->setCheckIn();

            return redirect('/')->with('status', trans('time_log.check_in_success'));
        } else {
            return redirect('/')->with('status', trans('time_log.check_in_fail'));
        }
    }
}
