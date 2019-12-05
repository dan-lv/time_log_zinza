<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Http\Requests\AbsentFormRequest;
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
        $absents = $this->absentRequestRepository->getAllAbsent();

        return view('admin.absent.index')->with('absents', $absents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('admin.absent.edit')->with('absent', $absent);
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

        return redirect()->back();
    }

    public function confirm(ConfirmAbsentFormRequest $request, $id)
    {
        $this->absentRequestRepository->confirmAbsent($request->validated(), $id);

        return redirect()->route('ad-absents.index');  
    }
}
