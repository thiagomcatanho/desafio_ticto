<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name'     => 'Admin Master',
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->employee()->count(10)->create();
    }
}
