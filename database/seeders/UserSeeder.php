<?php

namespace Database\Seeders;

use App\Models\User;
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

        $user->name = 'Wilma Cardoso';
        $user->data_nascimento = '1970-01-01';
        $user->genero_id = 2;
        $user->email = 'wilma@oceanlanguages.com.br';
        $user->cpf = '11111111111';
        $user->rg = '11111111111';
        $user->telefone = '11974131754';
        $user->password = bcrypt('123456');
        $user->tipo = 'master';
        $user->save();
    }
}
