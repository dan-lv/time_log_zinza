<?php

use App\Models\Profile;
use Faker\Generator as Faker;
use Faker\Factory;

$factory->define(Profile::class, function (Faker $faker) {
    $faker = Factory::create('vi_VN');
    $user_id = DB::table('users')->pluck('id');

    return [
        'fullname' => $faker->name,
        'birthday' => $faker->date($format = 'Y-m-d', $max = '2001-10-01'),
        'address' => $faker->address,
        'position' => $faker->randomElement(['HR', 'Dev', 'Lead', 'Manager']),
        'gender' => $faker->randomElement([0, 1]),
        'phone_number' => $faker->phoneNumber,
        'user_id' => $faker->randomElement($user_id),
    ];
});
