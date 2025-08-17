<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): void  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->isValidLength($value) || $this->hasAllRepeatedDigits($value) || !$this->isValidCpf($value)) {
            $fail($this->message());
        }
    }

    /**
     * Check if CPF has exactly 11 digits.
     */
    private function isValidLength(string $cpf): bool
    {
        return strlen($cpf) === 11;
    }

    /**
     * Reject CPFs with all digits equal (e.g., 11111111111).
     */
    private function hasAllRepeatedDigits(string $cpf): bool
    {
        return preg_match('/^(\d)\1{10}$/', $cpf) === 1;
    }

    /**
     * Validate CPF verification digits.
     */
    private function isValidCpf(string $cpf): bool
    {
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += (int) $cpf[$c] * (($t + 1) - $c);
            }
            $digit = ((10 * $d) % 11) % 10;

            if ((int) $cpf[$t] !== $digit) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __('validation.custom.document.invalid');
    }
}
