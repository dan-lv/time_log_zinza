<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\LogProfileRepository;

class ProfileLogController extends Controller
{
    private $logProfileRepository;

    public function __construct(LogProfileRepository $logProfileRepository)
    {
        $this->logProfileRepository = $logProfileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = $this->logProfileRepository->getAllLogs();

        return view('admin.logs.profile_change')->with('logs', $logs);
    }
}
