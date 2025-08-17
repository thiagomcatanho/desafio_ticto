<?php

namespace App\DTOs\Report;

use App\Support\DTOs\BaseDTO;

class UsersReportFilterDTO extends BaseDTO
{
    public function __construct(
        public ?string $dateBegin = null,
        public ?string $dateEnd = null,
    ) {}
}
