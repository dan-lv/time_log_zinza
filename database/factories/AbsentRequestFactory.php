<?php

use App\Models\AbsentRequest;
use Faker\Generator as Faker;

$factory->define(AbsentRequest::class, function (Faker $faker) {
    $user_id = DB::table('users')->pluck('id');

    return [
        'time_absent_from' => $faker->time($format = 'H:i:s', $min = '09:00:00', $max = '13:00:00'),
        'time_absent_to' => $faker->time($format = 'H:i:s', $min = '10:00:00', $max = '18:00:00'),
        'reason' => $faker->text($maxNbChars = 200),
        'status' => $faker->randomElement([0, 1, 2]),
        'day' => $faker->date($format = 'Y-m-d', $min = '2017-01-01', $max = 'now'),
        'user_id' => $faker->randomElement($user_id),
    ];
});
