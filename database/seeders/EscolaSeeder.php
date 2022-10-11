<?php

namespace Database\Seeders;

use App\Models\Escola;
use Illuminate\Database\Seeder;

class EscolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $escola = new Escola();
        $escola->nome = 'Colégio Guilherme de Almeida';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Parthenon Unidade I';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Parthenon Unidade II';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Mater Amábilis';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Carbonel';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Canadá';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Faraós';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Adventista';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Vinicius de Moraes';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Canobre';
        $escola->save();

        $escola = new Escola();
        $escola->nome = 'Colégio Âncora';
        $escola->save();
    }
}
