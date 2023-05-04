<?php

namespace Database\Factories;

use App\Models\Escolaridade;
use Illuminate\Database\Eloquent\Factories\Factory;

class EscolaridadeFactory extends Factory
{


    protected $model = Escolaridade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->name()
        ];
    }
}
