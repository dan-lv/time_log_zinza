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
    const NUMBER_OF_ITEM = 5;

    public function getUserId() {
        return Auth::user()->id;
    }

    public function createAbsentRequest($request) {
        $user = Auth::user();
        AbsentRequest::create([
            'time_absent_from' => $request['absent-from'],
            'time_absent_to' => $request['absent-to'],
            'day' => $request['day'],
            'reason' => $request['reason'],
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

        return AbsentRequest::where('user_id', $userId)->paginate(self::NUMBER_OF_ITEM);
    }

    public function getAllAbsent() {

        return AbsentRequest::paginate(self::NUMBER_OF_ITEM);
    }

    public function updateAbsent($request, $id) {
        
        $absent = $this->getAbsentById($id);

        $absent->update([
            'time_absent_from' => $request['absent-from'],
            'time_absent_to' => $request['absent-to'],
            'day' => $request['day'],
            'reason' => $request['reason'],
        ]);        
    }

    public function confirmAbsent($request, $id) {
        
        $absent = $this->getAbsentById($id);

        $absent->update([
            'status' => $request['action'],
        ]);
    }

    public function getAbsentById($id) {

        return AbsentRequest::where('id', $id)->first();
    }
}
