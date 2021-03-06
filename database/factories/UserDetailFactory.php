<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserDetails;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(UserDetails::class, function (Faker $faker) {
    return [
        'member_id' => $faker->unique()->randomNumber(4),
        'gender' => $faker->randomElement(array('Male', 'Female')),
        'national_id' => $faker->unique()->randomNumber(9),
        'cell_phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'birth_date' => $faker->dateTimeThisDecade,
        //'rank_id'
        //'team_id'
        'card_photo_url' => 'xxxx',
        //'course_id'
        'start_volunteering_date' => $faker->dateTimeThisCentury,

    ];
});
