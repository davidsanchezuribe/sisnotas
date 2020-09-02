<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProfesoresTableSeeder::class);
        $this->call(GradosTableSeeder::class);
        $this->call(EstudiantesTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
        $this->call(EvaluacionesTableSeeder::class);
        $this->call(NotasTableSeeder::class);
    }
}
