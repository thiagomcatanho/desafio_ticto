<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->admin()->create([
            'name'     => 'Admin Master',
            'email'    => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()
            ->employee()
            ->count(10)
            ->create([
                'password' => Hash::make('password')
            ])
            ->each(function ($employee) use ($admin) {
                UserAdmin::create([
                    'admin_id'    => $admin->id,
                    'employee_id' => $employee->id,
                ]);
            });
    }
}
