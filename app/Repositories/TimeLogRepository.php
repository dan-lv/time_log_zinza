<?php
namespace App\Repositories;

use App\Interfaces\TimeLogInterface;
use App\Models\TimeLog;
use Carbon\Carbon;
use App\Traits\Operators;

class TimeLogRepository implements TimeLogInterface
{
    use Operators;

    const NUMBER_OF_ITEM = 10;

    private function getTime()
    {
        return Carbon::now();
    }

    public function model() {
        return new TimeLog;
    }

    public function getTimeLogToday($userId) {
        $currentTime = $this->getTime();
        $today = $currentTime->toDateString();
        $checkTimeLog = TimeLog::where('user_id', $userId)->where('day', $today)->first();

        return $checkTimeLog;
    }

    public function setCheckIn($userId) {
        
        TimeLog::create([
            'check_in' => $this->getTime()->toTimeString(),
            'day' => $this->getTime()->toDateString(),
            'user_id' => $userId,
        ]);
    }

    public function setCheckOut($checkTimeLog) {
        $currentTime = $this->getTime();
        $checkTimeLog->update([
            'check_out' => $currentTime->toTimeString(),
        ]);
    }

    public function getTimeLogsByUserId($userId) {

        return TimeLog::where('user_id', $userId)->paginate(self::NUMBER_OF_ITEM);
    }

    public function getAll() {
        return TimeLog::with('user')->paginate(self::NUMBER_OF_ITEM);
    }

    public function createTimeLog($request) {
        return TimeLog::create([
            'check_in' => $request['check_in_time'],
            'check_out' => $request['check_out_time'],
            'day' => $request['day'],
            'user_id' => $request['user_id'],
        ]);
    }

    public function getTimeLogById($id) {
        return TimeLog::where('id', $id)->first();
    }

    public function updateTimeLog($request, $id) {
        $timeLog = $this->getTimeLogById($id);

        $timeLog->update([
            'check_in' => $request['check_in_time'],
            'check_out' => $request['check_out_time'],
            'day' => $request['day'],
        ]);

        return $timeLog;
    }

    public function getAllToExportByUserId($request, $userId) {
        return TimeLog::where('user_id', $userId)
        ->whereMonth('day', $this->operators[$request['operator_month']], $request['month'])
        ->whereYear('day', $this->operators[$request['operator_year']], $request['year'])
        ->get();
    }

    public function getAllToExport($request) {
        return TimeLog::with('user')
        ->whereMonth('day', $this->operators[$request['operator_month']], $request['month'])
        ->whereYear('day', $this->operators[$request['operator_year']], $request['year'])
        ->get();
    }
}
