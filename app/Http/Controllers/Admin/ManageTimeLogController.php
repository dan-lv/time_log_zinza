<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeLogFormRequest;
use App\Interfaces\TimeLogInterface;
use App\Exports\ManageTimeLogExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\FilterExportFormRequest;

class ManageTimeLogController extends Controller
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
    public function index()
    {
        $timeLogs = $this->timeLogRepository->getAll();

        return view('admin.timelog.index')->with('timeLogs', $timeLogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timeLog = $this->timeLogRepository->model();

        return view('admin.timelog.create_edit')->with('timeLog', $timeLog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeLogFormRequest $request)
    {
        $timeLog = $this->timeLogRepository->createTimeLog($request->validated());
        $request->session()->now('status', __('time_log.create_success'));

        return view('admin.timelog.create_edit')->with('timeLog', $timeLog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeLog = $this->timeLogRepository->getTimeLogById($id);

        return view('admin.timelog.create_edit')->with('timeLog', $timeLog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeLogFormRequest $request, $id)
    {
        $timeLog = $this->timeLogRepository->updateTimeLog($request->validated(), $id);
        $request->session()->now('status', __('time_log.edit_success'));

        return view('admin.timelog.create_edit')->with('timeLog', $timeLog);
    }

    public function timeLogOfUser($userId)
    {
        $timeLogs = $this->timeLogRepository->getTimeLogsByUserId($userId);

        return view('admin.timelog.timelog_user')->with('timeLogs', $timeLogs);
    }

    public function export(FilterExportFormRequest $request)
    {
        $timeLogs = $this->timeLogRepository->getAllToExport($request->validated());

        return Excel::download(new ManageTimeLogExport($timeLogs), 'TimeLogs.xlsx');
    }
}
