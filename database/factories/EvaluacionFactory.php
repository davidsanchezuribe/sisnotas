<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evaluacion;
use Faker\Generator as Faker;

$factory->define(Evaluacion::class, function (Faker $faker) {
    return [
        'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true), 
        'fecha' => $faker->date(),
        'porcentaje' => $faker->numberBetween($min = 1, $max = 100),
        'materia_id' => $faker->numberBetween($min = 1, $max = 60),
    ];
});
