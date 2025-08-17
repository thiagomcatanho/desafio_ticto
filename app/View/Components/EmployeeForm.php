<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User as Employee;

class EmployeeForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?Employee $employee = null) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.employee-form');
    }
}
