<?php

use Faker\Generator as Faker;

$factory->define(App\Forum::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class)->make(),
        'title' =>$faker->sentance,
        'content' => $faker->paragraph,
    ];
});
