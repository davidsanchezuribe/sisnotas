<?php

use Illuminate\Database\Seeder;

use App\Materia;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Materia::class, 60)->create();
    }
}
