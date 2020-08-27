<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserUniform;
use Faker\Generator as Faker;

$factory->define(UserUniform::class, function (Faker $faker) {
    return [
        'pant_size' => $faker->randomElement(['32', '33', '34', '35']),
        'belt_size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
        'shirt_size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
        'sweatshirt_size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
        'coat_size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
    ];
});
