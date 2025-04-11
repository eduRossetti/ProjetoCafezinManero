<?php

namespace Database\Factories;

use App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->unique()->numerify('(##) #####-####'),
        ];
    }
}