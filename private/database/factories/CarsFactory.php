<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cars;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(cars::class, function (Faker $faker) {
    return [
        'tally_no'=>Str::random(2),
        'plate_no'=>Str::random(10),
        'date'=>now(),
        
    ];
});
