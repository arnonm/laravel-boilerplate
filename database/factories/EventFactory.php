<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $start_date = $faker->dateTimeThisYear;
    $end_date = Carbon::parse($start_date)->addHour(rand(0, 40));

    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
//        'start_date'    => $start_date,
//        'end_date'      => $end_date,
        'start_time' => $start_date->format(config('boilerplate.date_format') . ' ' . config('boilerplate.time_format')),
        'end_time' => $end_date->format(config('boilerplate.date_format') . ' ' . config('boilerplate.time_format')),
        'location_id' => 4,
        'is_full_day_event' => false,
        'is_recurring' => false,
    ];
});
