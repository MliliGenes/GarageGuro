<?php

namespace Database\Factories;

use App\Models\Reparation;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reparation>
 */
class ReparationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reparation::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement([
                Reparation::STATUS_PENDING,
                Reparation::STATUS_IN_PROGRESS,
                Reparation::STATUS_COMPLETED,
                Reparation::STATUS_CANCELLED,
            ]),
            'startDate' => $this->faker->date,
            'endDate' => $this->faker->optional()->date,
            'mechanicNotes' => $this->faker->optional()->text,
            'clientNotes' => $this->faker->optional()->text,
            'mechanicID' => User::factory(),
            'vehicleID' => Vehicle::factory(),
        ];
    }
}