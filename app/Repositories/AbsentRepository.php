<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\AbsentInterface;
use App\Models\AbsentRequest;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class AbsentRepository implements AbsentInterface 
{
    public function createAbsentRequest(Request $request) {
        $user = Auth::user();
        AbsentRequest::create([
            'time_absent_from' => $request->get('absent-from'),
            'time_absent_to' => $request->get('absent-to'),
            'day' => $request->get('date'),
            'reason' => $request->get('reason'),
            'user_id' => $user->id,
        ]);
    }

    public function getAbsentToday() {
        $user = Auth::user();
        $currentTime = Carbon::now();
        $today = $currentTime->toDateString();
        $checkAbsent = AbsentRequest::where('user_id', $user->id)->where('day', $today)->first();

        return $checkAbsent;
    }

    public function getAbsentByUserId($userId) {
        return AbsentRequest::where('user_id', $userId)->paginate(5);
    }
}
