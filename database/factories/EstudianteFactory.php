<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estudiante;
use Faker\Generator as Faker;

$factory->define(Estudiante::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name(),
        'apellido' => $faker->unique()->lastName(),
        'telefono' => $faker->numberBetween($min = 3000000000, $max = 3210000000),
        'cedula' => $faker->unique()->numberBetween($min = 1000000, $max = 100000000),
        'grado_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
