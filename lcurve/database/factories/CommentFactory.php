<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
      'user_id' => factory(App\User::class)->make(),
      'forum_id' => factory(App\Forum::class)->make(),
      'content' => $faker->paragraph,
    ];
});
