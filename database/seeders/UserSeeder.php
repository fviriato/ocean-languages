<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\User;
use Database\Factories\ResponsavelFactory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user = new User();
        $user->name = 'Fernando Viriato';
        $user->data_nascimento = '1980-03-06';
        $user->genero_id = 1;
        $user->email = 'fsviriato@gmail.com';
        $user->cpf = '11111111111';
        $user->rg = '11111111111';
        $user->telefone = '11988334335';
        $user->password = bcrypt('123456');
        $user->save();


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

        User::factory(10)->hasEndereco()->hasAluno()->create();

        }
}
