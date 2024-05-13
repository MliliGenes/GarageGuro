<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'fuelType' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Electric']),
            'registration' => $this->faker->unique()->numerify('ABC ###'),
            'photos' => null,
            'clientID' => User::whereBetween('id', [2, 10])->inRandomOrder()->first()->id,
        ];
    }
}