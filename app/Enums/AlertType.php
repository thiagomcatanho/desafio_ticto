<?php

namespace App\Enums;

enum AlertType: string
{
    case SUCCESS = 'success';
    case ERROR   = 'error';
    case WARNING = 'warning';
    case INFO    = 'info';

    public function color(): string
    {
        return match($this) {
            self::SUCCESS => 'bg-green-100 border-green-500 text-green-700',
            self::ERROR   => 'bg-red-100 border-red-500 text-red-700',
            self::WARNING => 'bg-yellow-100 border-yellow-500 text-yellow-700',
            self::INFO    => 'bg-blue-100 border-blue-500 text-blue-700',
        };
    }

    public function icon(): string
    {
        return match($this) {
            self::SUCCESS => '✔️',
            self::ERROR   => '❌',
            self::WARNING => '⚠️',
            self::INFO    => 'ℹ️',
        };
    }
}
