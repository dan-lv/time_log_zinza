<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Interfaces\AbsentInterface;
use App\Models\AbsentRequest;
use Carbon\Carbon;
use App\Traits\Operators;
use App\Interfaces\TimeLogInterface;
use App\Interfaces\UserInterface;

class UserService
{
    use Operators;

    const NUMBER_OF_ITEM = 5;

    private $timeLogRepository;
    private $absentRequestRepository;
    private $userRepository;

    public function __construct(TimeLogInterface $timeLogRepository, AbsentInterface $absentRequestRepository, UserInterface $userRepository)
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->absentRequestRepository = $absentRequestRepository;
        $this->userRepository = $userRepository;
    }

    public function getUserMiss()
    {
        $user = $this->userRepository->getAllActiveUserId();
        $timelog_user_id = $this->timeLogRepository->getUserHasTimeLog();
        $absent_user_id = $this->absentRequestRepository->getUserHasAbsent();
        $user_available = array_merge($timelog_user_id, $absent_user_id);
        $miss_user_id = array_values(array_diff($user, $user_available));

        return $this->userRepository->getUserById($miss_user_id);
    }

    public function getDateToday()
    {
        return Carbon::now()->toDateString();
    }
}
