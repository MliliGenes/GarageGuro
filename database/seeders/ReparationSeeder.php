<?php

namespace Database\Seeders;

use App\Models\Reparation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReparationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Reparation::factory()->count(10)->create();
    }
}