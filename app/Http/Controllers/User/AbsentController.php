<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Interfaces\UserInterface;
use App\Http\Requests\AbsentFormRequest;
use App\Exports\UserAbsentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\FilterExportFormRequest;
use App\Events\AbsentCreated;

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
            event(new AbsentCreated);
            
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

    public function export(FilterExportFormRequest $request)
    {
        $userId = $this->userRepository->getCurrentUserId();
        $absents = $this->absentRequestRepository->getAcceptedAbsentsByUserId($request->validated(), $userId);
        $absentTime = $this->absentRequestRepository->getAbsentTime($absents);

        return Excel::download(new UserAbsentExport($absents, $absentTime), 'Absents.xlsx');
    }
}
