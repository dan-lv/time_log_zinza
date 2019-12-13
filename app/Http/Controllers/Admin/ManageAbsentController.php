<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Http\Requests\AbsentFormRequest;
use App\Http\Requests\AbsentByAdminFormRequest;
use App\Http\Requests\ConfirmAbsentFormRequest;

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
    
        return view('admin.absent.show')->with([
            'status' => __('absent.create_success'),
            'absent' => $absent,      
        ]);
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
        $this->absentRequestRepository->confirmAbsent($request->validated(), $id);

        return back();  
    }

    public function absentOfUser($userId)
    {
        $absents = $this->absentRequestRepository->getAbsentByUserId($userId);

        return view('admin.absent.absent_user')->with('absents', $absents);
    }

    public function processingAbsents()
    {
        $absents = $this->absentRequestRepository->getProcessingAbsents();

        return view('admin.absent.index')->with('absents', $absents);
    }
}
