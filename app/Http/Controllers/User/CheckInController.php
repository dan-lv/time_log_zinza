<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\CheckInInterface;

class CheckInController extends Controller
{
    private $checkInRepository;

    public function __construct(CheckInInterface $checkInRepository)
    {
        $this->checkInRepository = $checkInRepository;
    }

    public function store()
    {
        $check_time_log = $this->checkInRepository->getTimeLogToDay();

        if (!$check_time_log) {
            $this->checkInRepository->setCheckIn();

            return redirect('/')->with('status', 'You checked-in successful!');
        } else {
            return redirect('/')->with('status', 'You checked-in one time today!');
        }
    }
}
