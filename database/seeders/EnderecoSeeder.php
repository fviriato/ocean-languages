<?php

namespace Database\Seeders;

use App\Models\Endereco;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Factory;

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




        // $users = User::all();
        // Factory(Endereco::class,100)
        //     ->create()
        //     ->each(function($endereco) use ($users){
        //         $endereco->user_id = $users->random()->user_id;
        //     });



        // $faker = Faker::create();

        // foreach(range(1,100) as $index){

        //     $endereco = new Endereco();
        //     $endereco->user_id = User::factory();
        //     $endereco->cep = $faker->numberBetween(00000000,99999999);
        //     $endereco->logradouro = $faker->streetName();
        //     $endereco->numero = $faker->buildingNumber();
        //     $endereco->complemento = '';
        //     $endereco->bairro = 'Gopoúva';
        //     $endereco->municipio = $faker->city();
        //     $endereco->estado = $faker->stateAbbr();
        //     $endereco->save();

        // }
    }
}
