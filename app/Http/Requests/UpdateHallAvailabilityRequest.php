<?php

namespace App\Http\Requests;

use App\Enums\StatusAvailabilityEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHallAvailabilityRequest extends FormRequest
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
        return [
            'start_date' => 'required|date|after:today',
            'end_date'   => 'required|date|after:start_date',
            'status'     => 'required|in:' . implode(',', array_column(StatusAvailabilityEnum::cases(), 'value')),
        ];
    }
}
