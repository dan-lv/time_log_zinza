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
    private $TimeLogRepository;

    public function __construct(TimeLogInterface $TimeLogRepository)
    {
        $this->TimeLogRepository = $TimeLogRepository;
    }

    public function store()
    {
        $check_time_log = $this->TimeLogRepository->getTimeLogToDay(); 

        if ($check_time_log) {
            if (empty($check_time_log->check_out)) {
                $this->TimeLogRepository->setCheckOut($check_time_log);

                return redirect('/')->with('status', trans('time_log.check_out_success'));
            } else {
                return redirect('/')->with('status', trans('time_log.check_out_fail'));
            }
        } else {
            return redirect('/')->with('status', trans('time_log.check_in_first'));
        }
    }
}
