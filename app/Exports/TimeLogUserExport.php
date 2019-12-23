<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TimeLogUserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $timeLogs;

    public function __construct($timeLogs)
    {
        $this->timeLogs = $timeLogs;
    }

    public function view(): View
    {
        return view('user.timelog.export', [
            'timeLogs' => $this->timeLogs,
        ]);
    }
}
