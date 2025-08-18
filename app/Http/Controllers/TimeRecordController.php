<?php

namespace App\Http\Controllers;

use App\Services\TimeRecordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TimeRecordController extends Controller
{
    public function __construct(protected TimeRecordService $timeService) {}

    /**
     * Store a new time record for the authenticated user.
     *
     * @return RedirectResponse
     */
    public function storeTimeRecord(): RedirectResponse
    {
        $this->timeService->storeTimeRecord(Auth::id());

        return redirect()->back()
            ->with('status', __('messages.time_record_stored_successfully'))
            ->with('status_type', 'success');
    }
}

