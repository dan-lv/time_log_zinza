<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\AbsentInterface;
use App\Models\AbsentRequest;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $timeLogRepository;
    private $userRepository;
    private $absentRequestRepository;

    public function __construct(TimeLogInterface $timeLogRepository, UserInterface $userRepository, AbsentInterface $absentRequestRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->userRepository = $userRepository;
        $this->absentRequestRepository = $absentRequestRepository;
    }

    public function store()
    {
        $userId = $this->userRepository->getCurrentUserId();
        $existTimeLog = $this->timeLogRepository->getTimeLogToday($userId);
        $existAbsent = $this->absentRequestRepository->getAbsentToday($userId);

        if (!$existAbsent||($existAbsent->status == AbsentRequest::STATUS_DENY)) {
            if (!$existTimeLog) {
                return redirect('/')->with('status', trans('time_log.check_in_first'));
            } else {
                if (!$existTimeLog->check_out) {
                    $this->timeLogRepository->setCheckOut($existTimeLog);

                    return redirect('/')->with('status', trans('time_log.check_out_success'));
                } else {
                    return redirect('/')->with('status', trans('time_log.exist'));
                }
            }
        }
        if ($existAbsent && !$existTimeLog) {
            return redirect('/')->with('status', trans('absent.exist'));
        }
    }
}
