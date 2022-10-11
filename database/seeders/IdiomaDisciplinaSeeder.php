<?php

namespace Database\Seeders;

use App\Models\IdiomaDisciplina;
use Illuminate\Database\Seeder;

class IdiomaDisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Inglês';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Espanhol';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Francês';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Alemão';
        $idiomaDisciplina->tipo = 'idioma';
        $idiomaDisciplina->save();

    
        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Poruguês';
        $idiomaDisciplina->tipo = 'reforco';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Matemática';
        $idiomaDisciplina->tipo = 'reforco';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'História';
        $idiomaDisciplina->tipo = 'reforco';
        $idiomaDisciplina->save();

        $idiomaDisciplina = new IdiomaDisciplina();
        $idiomaDisciplina->nome = 'Geografia';
        $idiomaDisciplina->tipo = 'reforco';
        $idiomaDisciplina->save();

    }
}
