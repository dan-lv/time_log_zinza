<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AbsentInterface;
use App\Exports\UserAbsentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\FilterExportFormRequest;

class UserAbsentController extends Controller
{
    private $absentRequestRepository;

    public function __construct(AbsentInterface $absentRequestRepository)
    {
        $this->absentRequestRepository = $absentRequestRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $absents = $this->absentRequestRepository->getAbsentByUserId($userId);

        return view('admin.absent.absent_user')->with('absents', $absents);
    }

    public function export(FilterExportFormRequest $request, $userId)
    {
        $absents = $this->absentRequestRepository->getAcceptedAbsentsByUserId($request->validated(), $userId);
        $absentTime = $this->absentRequestRepository->getAbsentTime($absents);

        return Excel::download(new UserAbsentExport($absents, $absentTime), 'Absents.xlsx');
    }
}
