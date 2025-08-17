<?php

namespace App\Http\Controllers;

use App\DTOs\User\CreateUserDTO;
use App\DTOs\User\UpdateUserDTO;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(private UserService $userService) {}

    /**
     * Display a listing of employees.
     */
    public function index(Request $request): View
    {
        $employees = $this->userService->listEmployees($request->query('search'));

        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create(): View
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $dto = CreateUserDTO::employee($request->validated());

        $this->userService->createEmployee($dto, Auth::id());

        return redirect()->route('users.index')
            ->with('status', __('messages.employee_created_successfully'))
            ->with('status_type', 'success');
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(int $id): View
    {
        $employee = $this->userService->findEmployeeOrFail($id);

        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(UserUpdateRequest $request, int $id): RedirectResponse
    {
        $dto = UpdateUserDTO::fromArray($request->validated());

        $this->userService->updateEmployee($dto, $id);

        return redirect()->route('users.index')
            ->with('status', __('messages.employee_updated_successfully'))
            ->with('status_type', 'success');
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->userService->deleteEmployee($id);

        return redirect()->route('users.index')
            ->with('status', __('messages.employee_deleted_successfully'))
            ->with('status_type', 'success');
    }
}

