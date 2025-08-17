<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\CpfRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'document' => preg_replace('/\D/', '', (string) $this->document),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $userId = $this->route('user') instanceof User
            ? $this->route('user')->id
            : $this->route('user');

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'document' => [
                'required',
                Rule::unique('users', 'document')->ignore($userId),
                new CpfRule,
            ],
            'position' => 'required|string|max:255',
            'birth_date' => 'required|date:Y-m-d',
            'zip_code' => 'required|string|min:8',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|min:2',
        ];
    }
}
