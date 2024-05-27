<?php

namespace Database\Factories;

use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facture>
 */
class FactureFactory extends Factory
{
    protected $model = Facture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $repairIDs = Reparation::pluck('id')->toArray();

        return [
            'repairID' => $this->faker->randomElement($repairIDs),
            'additionalCharges' => $this->faker->randomFloat(2, 0, 100),
            'totalAmount' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}