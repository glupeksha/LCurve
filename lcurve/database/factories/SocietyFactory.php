<?php

use Faker\Generator as Faker;

$factory->define(App\Society::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence,
        'content'=>$faker->paragraph,
        'subscribe'=>$faker->paragraph,
    ];
});
