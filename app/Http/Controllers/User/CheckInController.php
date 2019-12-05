<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;
use App\Interfaces\UserInterface;

class CheckInController extends Controller
{
    private $timeLogRepository;
    private $userRepository;

    public function __construct(TimeLogInterface $timeLogRepository, UserInterface $userRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->userRepository = $userRepository;
    }

    public function store()
    {
        $userId = $this->userRepository->getCurrentUserId();
        $checkTimeLog = $this->timeLogRepository->getTimeLogToday($userId);
        

        if (!$checkTimeLog) {
            $this->timeLogRepository->setCheckIn($userId);

            return redirect('/')->with('status', trans('time_log.check_in_success'));
        } else {
            return redirect('/')->with('status', trans('time_log.check_in_fail'));
        }
    }
}
