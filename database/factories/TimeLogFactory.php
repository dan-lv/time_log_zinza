<?php

use App\Models\TimeLog;
use Faker\Generator as Faker;

$factory->define(TimeLog::class, function (Faker $faker) {

    return [
        'check_in' => $faker->time($format = 'H:i:s', $min = '07:00:00', $max = '09:00:00'),
        'check_out' => $faker->time($format = 'H:i:s', $min = '17:30:00', $max = '22:00:00'),
        'day' => $faker->date($format = 'Y-m-d', $min = '2017-01-01', $max = 'now'),
    ];
    
});
