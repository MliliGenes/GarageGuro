<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SparePart>
 */
class SparePartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partName' => $this->faker->word,
            'partReference' => $this->faker->unique()->bothify('??-#####'),
            'supplier' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}