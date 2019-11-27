<?php
namespace App\Repositories;

use App\Interfaces\CheckOutInterface;

class CheckOutRepository extends BaseRepository implements CheckOutInterface
{
    public function setCheckOut($check_time_log) {
        $current_time = $this->setTime();
        $check_time_log->update([
            'check_out' => $current_time->toTimeString(),
        ]);
    }
}
