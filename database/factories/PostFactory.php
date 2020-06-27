<?php

use Carbon\Carbon;
use \App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text(1000),
        'image' => $faker->image('public/storage/',100,100, null, false),
        'publish' => (bool)random_int(0, 1),
        'published_at' => Carbon::instance($faker->dateTimeThisMonth())->toDateTimeString(),
    ];
});
