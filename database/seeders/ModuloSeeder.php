<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $modulo = new Modulo();

        $modulo->nome = 'Administrativo';
        $modulo->save();

        $modulo = new Modulo();
        $modulo->nome = 'Pedagógico';
        $modulo->save();

        $modulo = new Modulo();
        $modulo->nome = 'Financeiro';
        $modulo->save();

        $modulo = new Modulo();
        $modulo->nome = 'Gerencial';
        $modulo->save();
    }
}
