<?php

use App\Models\TimeLog;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(TimeLog::class, function (Faker $faker) {

    $result = [];
    $month = $faker->month;
    $year = $faker->year;
    $month31 = ['01', '03', '05', '07', '08', '10', '12'];
    $month30 = ['04', '06', '09', '11'];

    if (in_array($month, $month31)) {
        $dayOfMonth = 31;
    }
    if (in_array($month, $month30)) {
        $dayOfMonth = 30;
    }

    if ($month == '02') {
        if (date('L', mktime(0, 0, 0, 1, 1, $year))) {
            $dayOfMonth = 29;
        } else {
            $dayOfMonth = 28;
        }
    }

    for ($day = 1; $day < $dayOfMonth + 1; $day++) {
        $result[] = [
            'check_in' => $faker->time($format = 'H:i:s', $min = '07:00:00', $max = '09:00:00'),
            'check_out' => $faker->time($format = 'H:i:s', $min = '17:30:00', $max = '22:00:00'),
            'day' => Carbon::create($year, $month, $day),
        ];
    }

    return $result;
});
