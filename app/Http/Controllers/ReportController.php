<?php

namespace App\Http\Controllers;

use App\DTOs\Report\UsersReportFilterDTO;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function __construct(protected UserService $userService) {}

    /**
     * Display a report of users filtered by optional date range.
     *
     * @param Request $request
     * @return View
     */
    public function usersReport(Request $request): View
    {
        $filterDto = UsersReportFilterDTO::fromArray([
            'dateBegin' => $request->query('date_begin'),
            'dateEnd' => $request->query('date_end'),
        ]);

        $result = $this->userService->usersForReport($filterDto);

        return view('admin.report.users', compact('result'));
    }
}

