<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Display the home page based on the user's role.
     *
     * - Redirect admins to the users index.
     * - Show the employee home view for regular users.
     *
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('users.index');
        }

        return view('employee.home');
    }
}
