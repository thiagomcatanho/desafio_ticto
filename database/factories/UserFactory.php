<?php

namespace Database\Factories;

use App\Enums\UserRoles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'name'        => fake()->name(),
            'document'    => $this->generateValidCpf(),
            'email'       => fake()->unique()->safeEmail(),
            'password'    => 'secret_password',
            'role' => fake()->randomElement(array_map(fn($r) => $r->value, UserRoles::cases())),
            'position'    => fake()->jobTitle(),
            'birth_date'  => fake()->date('Y-m-d', '-20 years'),
            'zip_code'    => fake()->numerify('########'),
            'street'      => fake()->streetName(),
            'number'      => fake()->buildingNumber(),
            'neighborhood' => fake()->citySuffix(),
            'city'        => fake()->city(),
            'state'       => fake()->stateAbbr(),
        ];
    }

    public function admin()
    {
        return $this->state(fn() => ['role' => UserRoles::ADMIN->value]);
    }

    public function employee()
    {
        return $this->state(fn() => ['role' => UserRoles::EMPLOYEE->value]);
    }

    private function generateValidCpf(): string
    {
        $numbers = [];

        for ($i = 0; $i < 9; $i++) {
            $numbers[] = rand(0, 9);
        }

        $sum = 0;
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $sum += $numbers[$i] * $j;
        }
        $remainder = $sum % 11;
        $numbers[9] = ($remainder < 2) ? 0 : 11 - $remainder;

        $sum = 0;
        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $sum += $numbers[$i] * $j;
        }
        $remainder = $sum % 11;
        $numbers[10] = ($remainder < 2) ? 0 : 11 - $remainder;

        return implode('', $numbers);
    }
}
