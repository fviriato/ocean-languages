<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cep' => $this->faker->numberBetween(00000000-99999999),
            'logradouro' =>$this->faker->address(),
            'numero' =>$this->faker->buildingNumber(),
            'complemento' =>$this->faker->buildingNumber(),
            'bairro' =>$this->faker->city(),
            'municipio' =>$this->faker->city(),
            'estado' =>$this->faker->state(),
        ];
    }
}
