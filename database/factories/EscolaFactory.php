<?php

namespace Database\Factories;

use App\Models\Escola;
use Illuminate\Database\Eloquent\Factories\Factory;

class EscolaFactory extends Factory
{

    protected $model = Escola::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name()
        ];
    }
}
