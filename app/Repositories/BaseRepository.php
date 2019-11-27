<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\TimeLog;
use Carbon\Carbon;
use Auth;

class BaseRepository
{
    public function setTime()
    {
        return Carbon::now();
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function createTimeLog()
    {
        return new TimeLog;
    }

    public function getTimeLogToDay() {
        $user = $this->getUser();
        $current_time = $this->setTime();
        $today = $current_time->toDateString();
        $check_time_log = TimeLog::where('user_id', $user->id)->where('day', $today)->first();

        return $check_time_log;
    }
}
