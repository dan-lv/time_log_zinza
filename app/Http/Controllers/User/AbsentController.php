<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Interfaces\UserInterface;
use App\Http\Requests\AbsentFormRequest;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $absentRequestRepository;
    private $userRepository;

    public function __construct(AbsentInterface $absentRequestRepository, UserInterface $userRepository)
    {
        $this->absentRequestRepository = $absentRequestRepository;
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        return view('user.absent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AbsentFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();
        $checkAbsent = $this->absentRequestRepository->getAbsentToday($userId);
    
        if (!$checkAbsent) {
            $this->absentRequestRepository->createAbsentRequest($request->validated(), $userId);

            return redirect()->route('absents.create')->with('status', __('absent.success'));
        } else {
            return redirect()->route('absents.create')->with('status', __('absent.already_sent'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userId = $this->userRepository->getCurrentUserId();
        $absents = $this->absentRequestRepository->getAbsentByUserId($userId);

        return view('user.absent.index')->with('absents', $absents);
    }
}
