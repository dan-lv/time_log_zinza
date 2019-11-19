<?php

use App\Models\TimeLog;
use Faker\Generator as Faker;

$factory->define(TimeLog::class, function (Faker $faker) {
    $user_id = DB::table('users')->pluck('id');

    return [
        'check_in' => $faker->time($format = 'H:i:s', $min = '07:00:00', $max = '09:00:00'),
        'check_out' => $faker->time($format = 'H:i:s', $min = '17:30:00', $max = '22:00:00'),
        'day' => $faker->date($format = 'Y-m-d', $min = '2017-01-01', $max = 'now'),
        'user_id' => $faker->randomElement($user_id),
    ];
});
