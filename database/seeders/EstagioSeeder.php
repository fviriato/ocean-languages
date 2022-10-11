<?php

namespace Database\Seeders;

use App\Models\Estagio;
use Illuminate\Database\Seeder;

class EstagioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel = new Estagio();
        $nivel->nome = 'Básico';
        $nivel->descricao = 'Estágio Básico';
        $nivel->save();

        $nivel = new Estagio();
        $nivel->nome = 'Intermediário';
        $nivel->descricao = 'Estágio Intermediário';
        $nivel->save();

        $nivel = new Estagio();
        $nivel->nome = 'Avançado';
        $nivel->descricao = 'Estágio Avançado';
        $nivel->save();
    }
}
