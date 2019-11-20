<?php

use App\Models\TrackingChange;
use Faker\Generator as Faker;

$factory->define(TrackingChange::class, function (Faker $faker) {
    $time_log_id = DB::table('time_logs')->pluck('id');

    return [
        'action' => $faker->randomElement(['edit', 'delete']),
        'time_change' => $faker->dateTime(),
        'time_log_id' => $faker->randomElement($time_log_id),
    ];
});
