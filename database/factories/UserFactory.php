<?php

namespace Database\Factories;

use App\Enums\UserRoles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => $this->faker->name(),
            'document'    => $this->faker->numerify('###########'),
            'email'       => $this->faker->unique()->safeEmail(),
            'password'    => Hash::make('password'),
            'role'        => $this->faker->randomElement([UserRoles::ADMIN, UserRoles::EMPLOYEE]),
            'position'    => $this->faker->jobTitle(),
            'birth_date'  => $this->faker->date('Y-m-d', '-20 years'),
            'zip_code'    => $this->faker->numerify('########'),
            'street'      => $this->faker->streetName(),
            'number'      => $this->faker->buildingNumber(),
            'neighborhood' => $this->faker->citySuffix(),
            'city'        => $this->faker->city(),
            'state'       => $this->faker->stateAbbr(),
        ];
    }

    public function admin()
    {
        return $this->state(fn() => ['role' => UserRoles::ADMIN]);
    }

    public function employee()
    {
        return $this->state(fn() => ['role' => UserRoles::EMPLOYEE]);
    }
}
