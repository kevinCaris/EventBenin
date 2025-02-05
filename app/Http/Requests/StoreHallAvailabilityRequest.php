<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHallAvailabilityRequest extends FormRequest
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
            'hall_id'    => 'required|exists:halls,id',
            'start_date' => 'required|date|after:today',
            'end_date'   => 'required|date|after:start_date',
            'status'     => 'required|in:' . implode(',', array_column(StatusHallAvailabilityEnum::cases(), 'value')),
        ];
    }
}
