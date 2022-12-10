<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'escola_id' => $this->faker->numberBetween(1,11),
            'escolaridade_id' => $this->faker->numberBetween(1, 8)
        ];
    }
}
