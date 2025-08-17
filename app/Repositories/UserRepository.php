<?php

namespace App\Repositories;

use App\DTOs\Report\UsersReportFilterDTO;
use App\DTOs\User\UserListOptions;
use App\Enums\UserRoles;
use App\Models\User;
use App\Support\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{
    public function modelClass(): string
    {
        return User::class;
    }

    /**
     * List users using options DTO.
     *
     * @param \App\DTOs\UserListOptions $options
     *
     * @return LengthAwarePaginator
     */
    public function listUsers(UserListOptions $options): LengthAwarePaginator
    {
        return $this->entity
            ->when($options->role, fn($query) => $query->where('role', $options->role))
            ->when($options->search, function ($query) use ($options) {
                $query->where('name', 'like', "%{$options->search}%")
                    ->orWhere('email', 'like', "%{$options->search}%")
                    ->orWhere('document', 'like', "%{$options->search}%");
            })
            ->orderBy($options->orderBy, $options->direction)
            ->paginate($options->perPage)
            ->withQueryString();
    }

    /**
     * Convenience method to list employees specifically.
     *
     * @param string|null $search
     * @param int $perPage
     *
     * @return LengthAwarePaginator
     */
    public function listEmployees(?string $search = null, int $perPage = 10): LengthAwarePaginator
    {
        $options = UserListOptions::employees($search, $perPage);
        return $this->listUsers($options);
    }


    /**
     * Get Users report with optional datetime range.
     *
     * @param \App\DTOs\Report\EmployeeReportFilterDTO $dto
     *
     * @return array
     */
    public function usersForReport(UsersReportFilterDTO $dto): array
    {
        $bindings = [];
        $conditions = [];

        $sql = "
            SELECT
                tr.id,
                u.name,
                u.position,
                FLOOR(DATEDIFF(CURDATE(), u.birth_date) / 365.25) AS age,
                a.name AS admin_name,
                tr.created_at
            FROM time_records tr
            JOIN users u ON tr.user_id = u.id
            LEFT JOIN user_admins ua ON ua.employee_id = u.id
            LEFT JOIN users a ON a.id = ua.admin_id
        ";

        if ($dto->dateBegin) {
            $conditions[] = "tr.created_at >= ?";
            $bindings[] = $dto->dateBegin;
        }

        if ($dto->dateEnd) {
            $conditions[] = "tr.created_at <= ?";
            $bindings[] = $dto->dateEnd;
        }

        if (!empty($conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $sql .= " ORDER BY tr.created_at DESC";

        return DB::select($sql, $bindings);
    }
}
