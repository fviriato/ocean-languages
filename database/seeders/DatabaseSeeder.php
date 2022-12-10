<?php

namespace Database\Seeders;

// use Database\Seeders\EscolaridadeSeeder;
// use Database\Seeders\EscolaSeeder;
// use Database\Seeders\GeneroSeeder;
// use Database\Seeders\UserSeeder;

use App\Models\Aluno;
use App\Models\User;
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
        // User::factory(10)->hasEndereco()->create();

        $this->call(EscolaridadeSeeder::class);
        $this->call(EscolaSeeder::class);
        // $this->call(AlunoSeeder::class);
   
        $this->call(UserSeeder::class); 
        // $this->call(EnderecoSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(EstagioSeeder::class);
        $this->call(DisciplinaSeeder::class);
        $this->call(ResponsavelSeeder::class);

    }
}
