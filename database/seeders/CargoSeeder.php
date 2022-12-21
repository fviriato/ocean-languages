<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = new Cargo();
        $cargo->nome = 'Auxiliar de Escritório';
        $cargo->save();

        $cargo = new Cargo();
        $cargo->nome = 'Professor (a) de Idiomas';
        $cargo->save();        
        
        $cargo = new Cargo();
        $cargo->nome = 'Professor(a) de Reforço Escolar';
        $cargo->save();

        $cargo = new Cargo();
        $cargo->nome = 'Secretária(o)';
        $cargo->save();
    }
}
