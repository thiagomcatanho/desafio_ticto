<?php

namespace App\Repositories;

use App\Models\UserAdmin;
use App\Support\Repositories\BaseRepository;

class UserAdminRepository extends BaseRepository
{
    public function modelClass(): string
    {
        return UserAdmin::class;
    }
}