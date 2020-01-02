<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ManageTimeLogExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $timeLogs;
    private $workingTime;

    public function __construct($timeLogs, $workingTime)
    {
        $this->timeLogs = $timeLogs;
        $this->workingTime = $workingTime;
    }

    public function view(): View
    {
        return view('admin.timelog.export', [
            'timeLogs' => $this->timeLogs,
            'workingTime' => $this->workingTime,
        ]);
    }
}
