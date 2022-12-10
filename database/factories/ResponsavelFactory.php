<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsavelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'responsavel_nome' => $this->faker->name(),
            'responsavel_email' => $this->faker->unique()->safeEmail(),
            'responsavel_data_nascimento' => $this->faker->date(),
            'responsavel_cpf' => $this->faker->unique()->numberBetween(00000000000,99999999999),
            'responsavel_rg' => $this->faker->unique()->numberBetween(000000000,999999999),
            'responsavel_telefone' => $this->faker->phoneNumber(),
            'responsavel_cep' => $this->faker->numberBetween(00000000-99999999),
            'responsavel_logradouro' =>$this->faker->address(),
            'responsavel_numero' =>$this->faker->buildingNumber(),
            'responsavel_complemento' =>$this->faker->buildingNumber(),
            'responsavel_bairro' =>$this->faker->city(),
            'responsavel_municipio' =>$this->faker->city(),
            'responsavel_estado' =>$this->faker->state(),
        ];
    }
}
