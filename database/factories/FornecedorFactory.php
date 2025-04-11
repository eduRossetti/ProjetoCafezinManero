<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Fornecedor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'cnpj' => $this->faker->unique()->numerify('##.###.###/####-##'),
            'email' => $this->faker->unique()->safeEmail(),
            'uf' => $this->faker->stateAbbr(),
            'cidade' => $this->faker->city(),
        ];
    }
}