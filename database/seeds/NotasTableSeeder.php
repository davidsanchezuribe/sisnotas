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
        factory(Nota::class, 120)->create();
    }
}
