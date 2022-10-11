<?php

namespace Database\Seeders;

use App\Models\Escolaridade;
use Illuminate\Database\Seeder;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Ensino Fundamental Incompleto';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Ensino Fundamental Completo';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Ensino Médio Incompleto';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Ensino Médio Completo';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Ensino Superior Incompleto';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Ensino Superior Completo';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Pós Graduação Incompleto';
            $escolaridade->save();

            $escolaridade = new Escolaridade();
            $escolaridade->descricao = 'Pós Graduação Completo';
            $escolaridade->save();
    }
}
