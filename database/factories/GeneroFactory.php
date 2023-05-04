<?php

namespace Database\Factories;

use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneroFactory extends Factory
{

    protected $model = Genero::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->word()
        ];
    }
}
