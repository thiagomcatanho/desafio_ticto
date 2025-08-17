<?php

namespace App\Services;

use App\DTOs\User\CreateUserDTO;
use App\DTOs\User\UpdateUserDTO;
use App\Models\User;
use App\Repositories\UserAdminRepository;
use App\Repositories\UserRepository;
use App\Support\Services\BaseService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService extends BaseService
{
    public function __construct(
        UserRepository $repository,
        protected UserAdminRepository $adminRepository,
    ) {
        parent::__construct($repository);
    }

    /**
     * Create a new employee and associate with the given admin.
     */
    public function createEmployee(CreateUserDTO $dto, int $adminId): User
    {
        $employee = $this->repository->store($dto->toArray());

        $this->adminRepository->store([
            'admin_id' => $adminId,
            'employee_id' => $employee->id,
        ]);

        return $employee;
    }

    /**
     * Update the specified employee with the given data.
     */
    public function updateEmployee(UpdateUserDTO $dto, int $userId): bool
    {
        $employee = $this->findEmployeeOrFail($userId);

        return $employee->fill($dto->toArray())->save();
    }

    /**
     * Delete the specified employee.
     */
    public function deleteEmployee(int $userId): void
    {
        $this->findEmployeeOrFail($userId)->delete();
    }

    /**
     * Update the password of a given user.
     */
    public function updatePassword(int $userId, string $password): User
    {
        return $this->repository->update($userId, [
            'password' => Hash::make($password),
        ]);
    }

    /**
     * Find an employee by ID or fail with a ModelNotFoundException.
     */
    protected function findEmployeeOrFail(int $userId): User
    {
        $employee = $this->repository->findOrFail($userId);

        if (!$employee || !$employee->isEmployee()) {
            throw new ModelNotFoundException("Employee with ID {$userId} not found.");
        }

        return $employee;
    }
}
