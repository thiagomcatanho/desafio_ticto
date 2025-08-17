<?php

namespace App\View\Components;

use App\Enums\AlertType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $message;
    public AlertType $type;
    public string $color;
    public string $icon;

    public function __construct(
        string $sessionKey = 'status',
        string $typeKey = 'status_type'
    ) {
        $this->message = session($sessionKey, '');
        $this->type  = AlertType::tryFrom(session($typeKey, 'info')) ?? AlertType::INFO;
        $this->color = $this->type->color();
        $this->icon  = $this->type->icon();
    }

    public function render(): View|Closure|string
    {
        return view('layouts.components.alert');
    }
}
