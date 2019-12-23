<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ManageAbsentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $absents;

    public function __construct($absents)
    {
        $this->absents = $absents;
    }

    public function view(): View
    {
        return view('admin.absent.export', [
            'absents' => $this->absents,
        ]);
    }
}
