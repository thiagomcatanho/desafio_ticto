<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MeController extends Controller
{
    public function __construct(protected UserService $userService) {}

    /**
     * Show the form for editing the authenticated user's password.
     *
     * @return View
     */
    public function editPassword(): View
    {
        return view('me.edit-password');
    }

    /**
     * Update the authenticated user's password.
     *
     * @param UpdatePasswordRequest $request
     * @return RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $this->userService->updatePassword(Auth::id(), $request->password);

        return redirect()->route('home')
            ->with('status', __('messages.password_updated_successfully'))
            ->with('status_type', 'success');
    }
}

