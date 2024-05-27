<?php

namespace Database\Seeders;

use App\Models\Facture;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facture::factory()->count(10)->create();
    }
}