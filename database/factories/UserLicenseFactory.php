<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserLicense;
use Faker\Generator as Faker;

$factory->define(UserLicense::class, function (Faker $faker) {
    return [
        'number' => $faker->unique()->randomNumber(7),
        'year' => $faker->year,
        'type' => $faker->randomElement(array('A', 'B', 'C', 'D', 'AMB')),
        'expiration_date' => $faker->date,
    ];
});
