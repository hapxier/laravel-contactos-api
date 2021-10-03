<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directorios')->insert([
            [    
                'nombre'=>'Luis Salgado',
                'direccion'=>'La fraternidad',
                'telefono'=>99819913,
                'foto'=>null
            ],
            [
                'nombre'=>'Juan Perez',
                'direccion'=>'Villa franca',
                'telefono'=>99887755,
                'foto'=>null
            ]
        ]);
    }
}
