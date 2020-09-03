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
        $evalNames = array('Primer Parcial', 'Segundo Parcial', 'Tercer Parcial', 'Final');
        $evalPerc[0] = array(20, 20, 30, 30);
        $evalPerc[1] = array(23, 23, 24, 30);
        $evalPerc[2] = array(25, 25, 25, 25);
        for ($i = 1; $i <= config('seed.materias'); $i++) {
            $num = rand(0, 2);
            for($j = 0; $j < 4; $j++){
                factory(Evaluacion::class)->create([
                    'porcentaje' => $evalPerc[$num][$j],
                    'desc' => $evalNames[$j],
                    'materia_id' => $i,
                ]);
            }
        }
    }
}
