<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CheckInInterface;
use App\Models\User;
use App\Models\TimeLog;
use Carbon\Carbon;
use Auth;

class CheckInRepository implements CheckInInterface
{
    public function checkIn() {
        
        $user = Auth::user();
        $current_time = Carbon::now();
        $today = $current_time->toDateString();
        $check_time_log = TimeLog::where('user_id', $user->id)->where('day', $today)->first();

        if (!$check_time_log) {
            $time_log = TimeLog::create([
                'check_in' => $current_time->toTimeString(),
                'day' => $today,
                'user_id' => $user->id,
            ]);

            return redirect('/')->with('status', 'You checked-in successful!');
        } else {
            return redirect('/')->with('status', 'You checked-in one time today!');
        }
    }
}
