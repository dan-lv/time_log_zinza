<?php
namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\CheckOutInterface;
use App\Models\TimeLog;
use Carbon\Carbon;
use Auth;

class CheckOutRepository implements CheckOutInterface
{
	public function checkOut() {
		
        $user = Auth::user();
        $current_time = Carbon::now();
        $today = $current_time->toDateString();
        $check_time_log = TimeLog::where('user_id', $user->id)->where('day', $today)->first();

        if (empty($check_time_log->check_out)) {
            if ($check_time_log) {
                $check_time_log->update([
                    'check_out' => $current_time->toTimeString(),
                ]);

                return redirect('/')->with('status', 'You checked-out successful!');
            } else {
                return redirect('/')->with('status', 'You have to check-in first!');
            }
        } else {

            return redirect('/')->with('status', 'You checked_out today!');
        } 
    }
}