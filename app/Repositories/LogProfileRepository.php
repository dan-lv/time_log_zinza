<?php
namespace App\Repositories;

use App\Models\LogProfile;
use Carbon\Carbon;
use Auth;

class LogProfileRepository
{
    const NUMBER_OF_ITEM = 10;

    private function getCurrentTimeStamp() {
        return Carbon::now()->toDateTimeString();
    }

    private function getCurrentAdmin() {
        return Auth::user();
    }

    public function createLog($userId, array $fieldDiff) {
        LogProfile::create([
            'time_change' => $this->getCurrentTimeStamp(),
            'admin_name' => $this->getCurrentAdmin()->name,
            'field_change' => implode(", ", $fieldDiff),
            'action' => __('profile.edit_action'),
            'user_id' => $userId,
        ]);
    }

    public function getAllLogs() {
        return LogProfile::orderBy('created_at', 'desc')->paginate(self::NUMBER_OF_ITEM);
    }
}
