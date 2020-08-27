<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserVehicle;
use Faker\Generator as Faker;

$factory->define(UserVehicle::class, function (Faker $faker) {
    return [
        'license_plate' => $faker->randomNumber(8),
        'manufacturer' => $faker->randomElement(['Ford', 'Mercedes', 'Honda']),
        'manufacturing_date' => $faker->year,
        'offroad' => $faker->boolean,
        'towing' => $faker->boolean,

    ];
});
