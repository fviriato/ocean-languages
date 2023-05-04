<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{

    protected $model = Endereco::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => User::factory(),
            'cep'         => $this->faker->numerify('#####-###'),
            'logradouro'  => $this->faker->address(),
            'numero'      => $this->faker->buildingNumber(),
            'complemento' => $this->faker->buildingNumber(),
            'bairro'      => $this->faker->city(),
            'municipio'   => $this->faker->city(),
            'estado'      => $this->faker->state(),
        ];
    }
}
