<?php

namespace App\Services;

use App\Models\TimeRecord;
use App\Repositories\TimeRecordRepository;
use App\Support\Services\BaseService;

class TimeRecordService extends BaseService
{
    public function __construct(TimeRecordRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Store a new time record for the given user.
     */
    public function storeTimeRecord(int $userId): TimeRecord
    {
        return $this->repository->store([
            'user_id' => $userId,
        ]);
    }
}
