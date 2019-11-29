<?php

use Illuminate\Database\Seeder;

class GrupoABtableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Grupo::create(['Nombre_Grupo'=>'A']);
        \App\Grupo::create(['Nombre_Grupo'=>'B']);
    }
}
