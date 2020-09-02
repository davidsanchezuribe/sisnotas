<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profesor;
use Faker\Generator as Faker;

$factory->define(Profesor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
        'apellido' => $faker->lastName(),
        'cedula' => $faker->unique()->numberBetween($min = 1000000, $max = 100000000),
    ];
});