<?php

use App\Models\Profile;
use Faker\Generator as Faker;
use Faker\Factory;

$factory->define(Profile::class, function (Faker $faker, $user_id) {
    $faker = Factory::create('vi_VN');

    return [
        'fullname' => $faker->name,
        'birthday' => $faker->date($format = 'Y-m-d', $max = '2001-10-01'),
        'address' => $faker->address,
        'position' => $faker->randomElement(['HR', 'Dev', 'Lead', 'Manager']),
        'gender' => $faker->randomElement([0, 1]),
        'phone_number' => $faker->phoneNumber,
    ];
});
