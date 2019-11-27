<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CheckOutInterface;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $checkOutRepository;

    public function __construct(CheckOutInterface $checkOutRepository)
    {
        $this->checkOutRepository = $checkOutRepository;
    }

    public function store()
    {
        $check_time_log = $this->checkOutRepository->getTimeLogToDay(); 

        if ($check_time_log) {
            if (empty($check_time_log->check_out)) {
                $this->checkOutRepository->setCheckOut($check_time_log);

                return redirect('/')->with('status', 'You checked-out successful!');
            } else {
                return redirect('/')->with('status', 'You checked_out today!');
            }
        } else {
            return redirect('/')->with('status', 'You have to check-in first!');
        }
    }
}
