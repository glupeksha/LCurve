<?php

use Faker\Generator as Faker;

$factory->define(App\ClassRoom::class, function (Faker $faker) {
    return [
        'grade_id'=>factory(App\User::class)->make(),
        'name'=> $faker->letter
    ];
});
