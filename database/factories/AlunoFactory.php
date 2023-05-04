<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Endereco;
use App\Models\Escola;
use App\Models\Escolaridade;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{

    protected $model = Aluno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $aluno = new Aluno();
        return [
            'user_id'         => User::factory(),
            'matricula'       => $aluno->gerarMatriculaAluno(),
            'escola_id'       => Escola::factory(),
            'escolaridade_id' => Escolaridade::factory()
        ];
    }
}
