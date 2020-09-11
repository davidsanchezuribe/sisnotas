<?php

use Illuminate\Database\Seeder;

use App\Nota;

class NotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $evaluaciones = DB::table('notasview')->orderBy('evaluacion_id');

        $evaluaciones -> each(function($item) { 
            factory(Nota::class)->create([
                'estudiante_id' => $item -> estudiante_id,
                'evaluacion_id'=> $item -> evaluacion_id
            ]);      
        });
    }
}
