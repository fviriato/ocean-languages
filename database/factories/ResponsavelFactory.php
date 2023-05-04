<?php

namespace Database\Factories;

use App\Models\Aluno;
use App\Models\Escolaridade;
use App\Models\Responsavel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsavelFactory extends Factory
{


    protected $model = Responsavel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'aluno_id'        => Aluno::factory(),
            'user_id'         => User::factory(),
            'profissao'       => $this->faker->name(),
            'escolaridade_id' => Escolaridade::class

        ];
    }
}
