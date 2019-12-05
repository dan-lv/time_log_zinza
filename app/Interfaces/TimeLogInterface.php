<?php
namespace App\Interfaces;

interface TimeLogInterface
{
    public function getTimeLogToday();
    public function setCheckIn();
    public function setCheckOut(object $checkTimeLog);
    public function getTimeLogByUserId($userId);
}
