<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Http\Requests\AbsentFormRequest;

class AbsentController extends Controller
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

    public function create()
    {
        return view('user.absent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsentFormRequest $request)
    {
        $checkAbsent = $this->absentRequestRepository->getAbsentToday();
    
        if (!$checkAbsent) {
            $this->absentRequestRepository->createAbsentRequest($request);

            return redirect()->route('absents.create')->with('status', __('absent.success'));
        } else {
            return redirect()->route('absents.create')->with('status', __('absent.fail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $absents = $this->absentRequestRepository->getAbsentByUserId($userId);

        return view('user.show_absent')->with('absents', $absents);
    }
}
