<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Http\Requests\AbsentFormRequest;
use App\Http\Requests\AbsentByAdminFormRequest;
use App\Http\Requests\ConfirmAbsentFormRequest;
use App\Exports\ManageAbsentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\FilterExportFormRequest;
use App\Events\AbsentCreated;
use App\Events\AbsentReplied;

class ManageAbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $absentRequestRepository;

    public function __construct(AbsentInterface $absentRequestRepository)
    {
        $this->absentRequestRepository = $absentRequestRepository;
    }

    public function index()
    {
        $absents = $this->absentRequestRepository->getAllAbsents();

        return view('admin.absent.index')->with('absents', $absents);
    }

    public function create()
    {
        $absent = $this->absentRequestRepository->model();

        return view('admin.absent.create_edit')->with('absent', $absent);
    }

    public function store(AbsentByAdminFormRequest $request)
    {
        $absent = $this->absentRequestRepository->createAbsentByAdmin($request->validated());
        event(new AbsentCreated);
        $request->session()->now('status', __('absent.create_success'));

        return view('admin.absent.show')->with('absent', $absent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absent = $this->absentRequestRepository->getAbsentById($id);

        return view('admin.absent.create_edit')->with('absent', $absent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AbsentFormRequest $request, $id)
    {
        $this->absentRequestRepository->updateAbsent($request->validated(), $id);

        return back()->with('status', __('absent.edit_success'));
    }

    public function confirm(ConfirmAbsentFormRequest $request, $id)
    {
        $absent = $this->absentRequestRepository->confirmAbsent($request->validated(), $id);
        event(new AbsentReplied($absent));

        return back();
    }

    public function processingAbsents()
    {
        $absents = $this->absentRequestRepository->getProcessingAbsents();

        return view('admin.absent.index')->with('absents', $absents);
    }

    public function export(FilterExportFormRequest $request)
    {
        $absents = $this->absentRequestRepository->getAcceptedAbsentsByFilter($request->validated());
        $absentTime = $this->absentRequestRepository->getAbsentTime($absents);

        return Excel::download(new ManageAbsentExport($absents, $absentTime), 'Absents.xlsx');
    }
}
