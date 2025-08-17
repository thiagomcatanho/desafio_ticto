<?php

namespace App\Models;

use App\Enums\UserRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'document',
        'email',
        'password',
        'role',
        'position',
        'birth_date',
        'zip_code',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'role' => UserRoles::class,
        ];
    }

    /**
     * Get the user's document in a formatted way.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function document(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => substr($value, 0, 3) . '.' .
                substr($value, 3, 3) . '.' .
                substr($value, 6, 3) . '-' .
                substr($value, 9, 2),
            set: fn(string $value) => preg_replace('/\D/', '', $value)
        );
    }

    /**
     * Get the user's birth date in a formatted way.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function birthDate(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => date('d/m/Y', strtotime($value)),
            set: fn(string $value) => date('Y-m-d', strtotime($value))
        );
    }

    /**
     * Get the user's zip code in a formatted way.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function zipCode(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => substr($value, 0, 5) . '-' . substr($value, 5, 3),
            set: fn(string $value) => preg_replace('/\D/', '', $value)
        );
    }

    /**
     * Get the full address of the user as a single string.
     *
     * Combines the street, number, neighborhood, city, and state
     * into a formatted address.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullAddress(): Attribute
    {
        return Attribute::make(
            get: fn() => implode(', ', array_filter([
                $this->street,
                $this->number,
                $this->neighborhood,
                $this->city . ' - ' . $this->state
            ]))
        );
    }

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === UserRoles::ADMIN;
    }

    /**
     * Check if the user is an employee.
     *
     * @return bool
     */
    public function isEmployee(): bool
    {
        return $this->role === UserRoles::EMPLOYEE;
    }
}
