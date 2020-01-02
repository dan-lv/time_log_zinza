<?php
namespace App\Repositories;

use App\Models\ProfileLog;
use Carbon\Carbon;
use Auth;

class LogProfileRepository
{
    const NUMBER_OF_ITEM = 10;

    private function getCurrentTimeStamp()
    {
        return Carbon::now()->toDateTimeString();
    }

    private function getCurrentUser()
    {
        return Auth::user();
    }

    public function createLog($userId, array $fieldDiff)
    {
        ProfileLog::create([
            'time_change' => $this->getCurrentTimeStamp(),
            'update_user_id' => $this->getCurrentUser()->id,
            'field_change' => implode(", ", $fieldDiff),
            'action' => __('profile.edit_action'),
            'user_id' => $userId,
        ]);
    }

    public function getAllLogs()
    {
        return ProfileLog::orderBy('created_at', 'desc')->paginate(self::NUMBER_OF_ITEM);
    }
}
