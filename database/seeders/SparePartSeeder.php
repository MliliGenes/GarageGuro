<?php

namespace Database\Seeders;

use App\Models\SparePart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SparePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 spare parts with random data
        SparePart::factory()->count(10)->create();
    }
}