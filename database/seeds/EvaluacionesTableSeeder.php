<?php

use Illuminate\Database\Seeder;

use App\Evaluacion;

class EvaluacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Evaluacion::class, 30)->create();
    }
}
