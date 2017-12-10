<?php

use Faker\Generator as Faker;

$factory->define(App\Sport::class, function (Faker $faker) {
    return [
      'name'=>$faker->sentence,
      'content'=>$faker->paragraph,
      'subscribe'=>$faker->paragraph,
    ];
});
