<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Materia;
use Faker\Generator as Faker;

$factory->define(Materia::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
    return [
        'nombre' => $faker->course,
        'profesor_id' => $faker->numberBetween($min = 1, $max = 50),
        'grado_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
