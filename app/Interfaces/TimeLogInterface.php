<?php
namespace App\Interfaces;

interface TimeLogInterface
{
    public function getTimeLogToday($userId);
    public function setCheckIn($userId);
    public function setCheckOut(object $checkTimeLog);
    public function getTimeLogsByUserId($userId);
}
