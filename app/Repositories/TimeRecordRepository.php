<?php

namespace App\Repositories;

use App\Models\TimeRecord;
use App\Support\Repositories\BaseRepository;

class TimeRecordRepository extends BaseRepository
{
    public function modelClass(): string
    {
        return TimeRecord::class;
    }
}