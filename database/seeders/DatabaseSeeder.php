<?php

namespace Database\Seeders;

use Database\Seeders\EscolaridadeSeeder;
use Database\Seeders\EscolaSeeder;
use Database\Seeders\GeneroSeeder;
use Database\Seeders\UserSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(GeneroSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EscolaridadeSeeder::class);
        $this->call(EscolaSeeder::class);
        $this->call(EnderecoSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(EstagioSeeder::class);
        $this->call(IdiomaDisciplinaSeeder::class);
    }
}
