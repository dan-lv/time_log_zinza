<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;
use App\Interfaces\UserInterface;

class TimeLogController extends Controller
{
    private $timeLogRepository;
    private $userRepository;

    public function __construct(TimeLogInterface $timeLogRepository, UserInterface $userRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $userId = $this->userRepository->getCurrentUserId();
        $timeLogs = $this->timeLogRepository->getTimeLogsByUserId($userId);
        
        return view('user.timelog.index')->with('timeLogs', $timeLogs);
    }
}
