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
        $fuelTypes = ['Gasoline', 'Diesel', 'Electric'];
        $carMake = $this->faker->word;
        $carModel = $this->faker->word;
        $fuelType = $this->faker->randomElement($fuelTypes);
        $registration = $this->faker->unique()->numerify('ABC ###');

        // Generate an array of random photo URLs
        $photoUrls = [];
        for ($i = 0; $i < 3; $i++) { // Change 3 to the desired number of photos per car
            $photoUrls[] = $this->faker->imageUrl(640, 480, 'cars'); // Generate a random car photo URL
        }

        return [
            'make' => $carMake,
            'model' => $carModel,
            'fuelType' => $fuelType,
            'registration' => $registration,
            'photos' => json_encode($photoUrls), // Convert the array to JSON format
            'clientID' => User::whereBetween('id', [2, 10])->inRandomOrder()->first()->id,
        ];
    }
}
