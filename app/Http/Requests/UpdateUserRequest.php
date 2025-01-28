<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        Log::info('accepted');
        return [
            'name' => ['required', 'string', 'max:255',Rule::unique('users','name')->ignore($this->user()->id)],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($this->route('user')->id)],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:' . implode(',', array_column(RoleEnum::cases(), 'value'))],
        ];
    }
}
