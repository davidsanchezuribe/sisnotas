<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Nota;
use Faker\Generator as Faker;

$factory->define(Nota::class, function (Faker $faker) {
    return [
        'valor' => $faker->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 5),
        'estudiante_id' => $faker->numberBetween($min = 1, $max = 100),
        'evaluacion_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});
