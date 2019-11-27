<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $timeLogRepository;

    public function __construct(TimeLogInterface $timeLogRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
    }

    public function store()
    {
        $checkTimeLog = $this->timeLogRepository->getTimeLogToday(); 

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
