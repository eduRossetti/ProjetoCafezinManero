<?php

namespace Database\Factories;

use App\Models\Coffee;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffee>
 */
class CoffeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Coffee::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'seal' => $this->faker->randomElement([
                'Extraforte',
                'Tradicional',
                'Gourmet',
                'Superior',
                'Especial'
            ]),
            'barcode' => $this->faker->unique()->numerify('##########'),
            'price' => $this->faker->randomFloat(8, 2, 100),
            'fornecedores_id' => Fornecedor::factory(),
        ];
    }
}