<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;

class UserTimeLogController extends Controller
{
    private $timeLogRepository;

    public function __construct(TimeLogInterface $timeLogRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $timeLogs = $this->timeLogRepository->getTimeLogsByUserId($userId);

        return view('admin.timelog.timelog_user')->with('timeLogs', $timeLogs);
    }
}
