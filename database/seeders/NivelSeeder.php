<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel = new Nivel();
        $nivel->nome = 'Starter';
        $nivel->sigla = 'A1';
        $nivel->descricao = 'Iniciante no Idioma';
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nome = 'Basic 1';
        $nivel->sigla = 'B1';
        $nivel->descricao = 'Básico 1';
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nome = 'Pré Intermediate';
        $nivel->sigla = 'I1';
        $nivel->descricao = 'Intermediário 1';
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nome = 'Advanced';
        $nivel->sigla = 'AD';
        $nivel->descricao = 'Avançado 1';
        $nivel->save();
    }
}
