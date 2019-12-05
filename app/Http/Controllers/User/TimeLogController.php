<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;

class TimeLogController extends Controller
{
    private $timeLogRepository;

    public function __construct(TimeLogInterface $timeLogRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
    }

    public function index()
    {
        $userId = $this->timeLogRepository->getUser()->id;
        $timeLogs = $this->timeLogRepository->getTimeLogByUserId($userId);
        
        return view('user.timelog.index')->with('timeLogs', $timeLogs);
    }
}
