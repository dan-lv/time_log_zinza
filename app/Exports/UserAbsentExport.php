<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserAbsentExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $absents;
    private $absentTime;

    public function __construct($absents, $absentTime)
    {
        $this->absents = $absents;
        $this->absentTime = $absentTime;
    }

    public function view(): View
    {
        return view('user.absent.export', [
            'absents' => $this->absents,
            'absentTime' => $this->absentTime,
        ]);
    }
}
