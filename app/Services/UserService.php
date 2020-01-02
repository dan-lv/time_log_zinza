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

    public function getMissTimeLogUser()
    {
        $activeUserId = $this->userRepository->getAllActiveUserId();
        $timelogUserId = $this->timeLogRepository->getUserHasTimeLog();
        $absentUserId = $this->absentRequestRepository->getUserHasAbsent();
        $availableUser = array_merge($timelogUserId, $absentUserId);
        $missUserId = array_diff($activeUserId, $availableUser);

        return $this->userRepository->getUserById($missUserId);
    }

    public function getDateToday()
    {
        return Carbon::now()->toDateString();
    }

    public function getMissCheckOutUser()
    {
        $activeUserId = $this->userRepository->getAllActiveUserId();
        $missCheckOutUserId = $this->timeLogRepository->getMissCheckOutUser();
        $missActiveUserId = array_intersect($missCheckOutUserId, $activeUserId);

        return $this->userRepository->getUserById($missActiveUserId);
    }

    public function hasMissTimeLogUsers()
    {
        return $this->getMissTimeLogUser()->exists;
    }
}
