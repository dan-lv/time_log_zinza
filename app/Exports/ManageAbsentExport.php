<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ManageAbsentExport implements FromView, ShouldAutoSize
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
        return view('admin.absent.export', [
            'absents' => $this->absents,
            'absentTime' => $this->absentTime,
        ]);
    }
}
