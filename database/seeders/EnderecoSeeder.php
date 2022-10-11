<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endereco = new Endereco();
        $endereco->user_id = 1;
        $endereco->cep = '07040000';
        $endereco->logradouro = 'Rua Cônego Valadão';
        $endereco->numero = '1162';
        $endereco->complemento = '';
        $endereco->bairro = 'Gopoúva';
        $endereco->municipio = 'Guarulhos';
        $endereco->estado = 'SP';
        $endereco->save();
    }
}
