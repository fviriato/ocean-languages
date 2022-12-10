<?php

namespace Database\Seeders;

use App\Models\Aluno;
use App\Models\Responsavel;
use App\Models\User;
use Illuminate\Database\Seeder;

class ResponsavelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Responsavel::factory(5)->forAluno()->create();

        // User::factory(10)->hasEndereco()->hasAluno()->hasResponsavel()->create();

        Aluno::factory()->forUser()->hasResponsavel()->create();
    }
}
