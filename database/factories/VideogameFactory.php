<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Videogame;
use Faker\Generator as Faker;

$factory->define(Videogame::class, function (Faker $faker) {
    return [
        'title' => $faker -> word(),
        'subtitle' => $faker -> word(),
        'rating' => $faker -> numberBetween(0, 5)
    ];
});
