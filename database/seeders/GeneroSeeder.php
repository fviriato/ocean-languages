<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new Genero();
        $genero->nome = 'Masculino';
        $genero->save();

        $genero = new Genero();
        $genero->nome = 'Feminino';
        $genero->save();

        $genero = new Genero();
        $genero->nome = 'Outros';
        $genero->save();
    }
}
