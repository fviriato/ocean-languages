<?php

namespace Database\Seeders;

use App\Models\Disciplina;
use Illuminate\Database\Seeder;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Inglês';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Espanhol';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Francês';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Alemão';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

    
        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Português';
        $idiomaDisciplina->tipo = 'reforco_escolar';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Matemática';
        $idiomaDisciplina->tipo = 'reforco_escolar';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'História';
        $idiomaDisciplina->tipo = 'reforco_escolar';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new Disciplina();
        $idiomaDisciplina->nome = 'Geografia';
        $idiomaDisciplina->tipo = 'reforco_escolar';
        $idiomaDisciplina->save();

    }
}
