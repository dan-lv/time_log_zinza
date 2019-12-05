<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;
use App\Interfaces\UserInterface;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        if ($checkTimeLog) {
            if (empty($checkTimeLog->check_out)) {
                $this->timeLogRepository->setCheckOut($checkTimeLog);

                return redirect('/')->with('status', trans('time_log.check_out_success'));
            } else {
                return redirect('/')->with('status', trans('time_log.check_out_fail'));
            }
        } else {
            return redirect('/')->with('status', trans('time_log.check_in_first'));
        }
    }
}
