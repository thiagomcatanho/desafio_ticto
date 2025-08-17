<?php

namespace App\DTOs\User;

use App\Enums\UserRoles;
use App\Support\DTOs\BaseDTO;

class CreateUserDTO extends BaseDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $document,
        public readonly string $password,
        public readonly string $position,
        public readonly string $birth_date,
        public readonly string $zip_code,
        public readonly string $street,
        public readonly string $number,
        public readonly string $neighborhood,
        public readonly string $city,
        public readonly string $state,
        public readonly UserRoles $role,
    ) {}

    /**
     * Factory for employee.
     */
    public static function employee(array $data): self
    {
        $data['role'] = UserRoles::EMPLOYEE;

        return self::fromArray($data);
    }
}
