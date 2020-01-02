<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\TimeLogInterface;
use App\Interfaces\UserInterface;
use App\Exports\UserTimeLogExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\FilterExportFormRequest;

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

    public function export(FilterExportFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();
        $timeLogs = $this->timeLogRepository->getAllToExportByUserId($request->validated(), $userId);
        $workingTime = $this->timeLogRepository->getWorkingTime($timeLogs);

        return Excel::download(new UserTimeLogExport($timeLogs, $workingTime), 'TimeLogs.xlsx');
    }
}
