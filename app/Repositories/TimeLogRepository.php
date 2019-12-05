<?php
namespace App\Repositories;

use App\Interfaces\TimeLogInterface;
use App\Models\User;
use App\Models\TimeLog;
use Carbon\Carbon;
use Auth;

class TimeLogRepository implements TimeLogInterface 
{
    const NUMBER_OF_ITEM = 10;

    private function getTime()
    {
        return Carbon::now();
    }

    public function getUser()
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

    public function setCheckOut($checkTimeLog) {
        $currentTime = $this->getTime();
        $checkTimeLog->update([
            'check_out' => $currentTime->toTimeString(),
        ]);
    }

    public function getTimeLogByUserId($userId) {

        return TimeLog::where('user_id', $userId)->paginate(self::NUMBER_OF_ITEM);
    }
}
