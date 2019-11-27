<?php
namespace App\Repositories;

use App\Interfaces\TimeLogInterface;
use App\Models\User;
use App\Models\TimeLog;
use Carbon\Carbon;
use Auth;

class TimeLogRepository implements TimeLogInterface 
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

    public function setCheckIn() { 
        
        $this->createTimeLog()->create([
            'check_in' => $this->setTime()->toTimeString(),
            'day' => $this->setTime()->toDateString(),
            'user_id' => $this->getUser()->id,
        ]);
    }

    public function setCheckOut($check_time_log) {
        $current_time = $this->setTime();
        $check_time_log->update([
            'check_out' => $current_time->toTimeString(),
        ]);
    }
}
