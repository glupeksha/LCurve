<?php

use Faker\Generator as Faker;

$factory->define(App\Announcement::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'calanderDate' => $faker->dateTime,
        'expireDate' => $faker->dateTime,
        'event_id'=> factory(App\Event::class)->make(),
    ];
});
