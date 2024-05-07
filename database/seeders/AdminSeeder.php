<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create an admin user
        User::create([
            'firstName' => 'Admin',
            'lastName' => 'User',
            'address' => '123 Admin Street',
            'phoneNumber' => '123-456-7890',
            'email' => 'admin@example.com',
            'role' => 'ADMIN',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // Hash the password
            'remember_token' => Str::random(10),
        ]);
    }
}