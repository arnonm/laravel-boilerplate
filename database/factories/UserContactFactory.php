<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserContact;
use Faker\Generator as Faker;

$factory->define(UserContact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'relation' => $faker->word,
        'national_id' => $faker->randomNumber(9),
    ];
});
