<?php

namespace App\DTOs\User;

use App\Enums\UserRoles;

class UserListOptions
{
    public function __construct(
        public ?UserRoles $role = null,
        public ?string $search = null,
        public int $perPage = 10,
        public string $orderBy = 'name',
        public string $direction = 'asc'
    ) {}

    /**
     * Factory method for listing employees.
     */
    public static function employees(?string $search = null, int $perPage = 10): self
    {
        return new self(UserRoles::EMPLOYEE, $search, $perPage);
    }
}
