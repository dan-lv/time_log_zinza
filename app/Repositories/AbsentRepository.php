<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\AbsentInterface;
use App\Models\AbsentRequest;
use Carbon\Carbon;

class AbsentRepository implements AbsentInterface 
{
    const NUMBER_OF_ITEM = 5;

    public function createAbsentRequest($request, $userId) {
        AbsentRequest::create([
            'time_absent_from' => $request['absent-from'],
            'time_absent_to' => $request['absent-to'],
            'day' => $request['day'],
            'reason' => $request['reason'],
            'user_id' => $userId,
        ]);
    }

    public function getAbsentToday($userId) {
        $currentTime = Carbon::now();
        $today = $currentTime->toDateString();
        $checkAbsent = AbsentRequest::where('user_id', $userId)->where('day', $today)->first();

        return $checkAbsent;
    }

    public function getAbsentByUserId($userId) {

        return AbsentRequest::where('user_id', $userId)->paginate(self::NUMBER_OF_ITEM);
    }

    public function getAllAbsents() {

        return AbsentRequest::with('user')->paginate(self::NUMBER_OF_ITEM);
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

    public function createAbsentByAdmin($request) {
        return AbsentRequest::create([
            'time_absent_from' => $request['absent_from'],
            'time_absent_to' => $request['absent_to'],
            'day' => $request['day'],
            'reason' => $request['reason'],
            'user_id' => $request['user_id'],
        ]);
    }

    public function getAbsentsProcessing() {

        return AbsentRequest::where('status', 0)->paginate(self::NUMBER_OF_ITEM);
    }
}
