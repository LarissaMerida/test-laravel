<?php

use \App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text(1000),
        'image' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
    ];
});
