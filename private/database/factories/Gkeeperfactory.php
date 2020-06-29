<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gkeeper;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Gkeeper::class, function (Faker $faker) {
    $type = ['Staff','IT','Contract Staff'];
    return [
        'name'=> $faker->name,
        'idno'=> Str::random(5),
        'type'=>$type[rand(0,2)],
        'exp_date'=>$faker->dateTimeBetween('now', '+3 years'),
        'dept'=>'ITD',
    ];
});
