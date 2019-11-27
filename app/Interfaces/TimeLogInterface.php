<?php
namespace App\Interfaces;

interface TimeLogInterface
{
    public function getTimeLogToday();
    public function setCheckIn();
    public function setCheckOut(object $check_time_log);
}
