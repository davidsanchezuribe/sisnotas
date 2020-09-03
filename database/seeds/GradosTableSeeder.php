<?php

use Illuminate\Database\Seeder;

use App\Grado;

class GradosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Grado::class, config('seed.grados'))->create();
    }
}
