<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    $fakeDate=$faker->dateTime;
    return [
        'title' => $faker->sentence,
        'start' => $fakeDate,
        'end' => $fakeDate,
        'isAllDay' => $faker->boolean,
        'url' => $faker->url
    ];
});
