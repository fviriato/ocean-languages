<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->unique()->safeEmail(),
            'data_nascimento'   => $this->faker->date(),
            'genero_id'         => Genero::factory(),
            'cpf'               => $this->faker->unique()->numberBetween(00000000000, 99999999999),
            'rg'                => $this->faker->unique()->numberBetween(000000000, 999999999),
            'telefone'          => $this->faker->phoneNumber(),
            'tipo'              => $this->faker->randomElement(['aluno', 'colaborador']),
            'email_verified_at' => now(),
            'password'          => bcrypt('admin'), // password
            'remember_token'    => Str::random(10),
        ];

    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
