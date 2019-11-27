<?php
namespace App\Repositories;

use App\Interfaces\TimeLogInterface;
use App\Models\User;
use App\Models\TimeLog;
use Carbon\Carbon;
use Auth;

class TimeLogRepository implements TimeLogInterface 
{
    private function getTime()
    {
        return Carbon::now();
    }

    private function getUser()
    {
        return Auth::user();
    }

    private function createTimeLog()
    {
        return new TimeLog;
    }

    public function getTimeLogToday() {
        $user = $this->getUser();
        $currentTime = $this->getTime();
        $today = $currentTime->toDateString();
        $checkTimeLog = TimeLog::where('user_id', $user->id)->where('day', $today)->first();

        return $checkTimeLog;
    }

    public function setCheckIn() { 
        
        $this->createTimeLog()->create([
            'check_in' => $this->getTime()->toTimeString(),
            'day' => $this->getTime()->toDateString(),
            'user_id' => $this->getUser()->id,
        ]);
    }

    public function setCheckOut($check_time_log) {
        $currentTime = $this->getTime();
        $checkTimeLog->update([
            'check_out' => $currentTime->toTimeString(),
        ]);
    }
}
