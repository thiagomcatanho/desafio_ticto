<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'document'=> '12345678901',
            'password'=> Hash::make('12345678'),
            'role' => UserRoles::ADMIN,
            'position' => 'Administrator',
            'birth_date' => '1990-01-01',
            'zip_code' => '12345678',
            'street' => 'Main St',
            'number' => '123',
            'neighborhood' => 'Downtown',
            'city' => 'Metropolis',
            'state' => 'NY',
        ]);
    }
}
