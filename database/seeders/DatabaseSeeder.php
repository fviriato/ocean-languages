<?php

namespace Database\Seeders;


use App\Models\Aluno;
use App\Models\User;
use Database\Factories\AlunoFactory;
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

        $this->call([

            UserSeeder::class

        ]);


        // Aluno::factory()->count(10)->create();

    }
}
