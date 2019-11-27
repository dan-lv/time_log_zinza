<?php
namespace App\Interfaces;

interface TimeLogInterface
{
    public function setTime();
    public function getUser();
    public function createTimeLog();
    public function getTimeLogToDay();
    public function setCheckIn();
    public function setCheckOut(object $check_time_log);
}
