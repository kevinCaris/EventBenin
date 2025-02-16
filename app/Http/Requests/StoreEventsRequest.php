<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreEventsRequest extends FormRequest
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
            'event_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'amount' => 'nullable|decimal:0,2',
            'details' => 'nullable|string',
            'hall_id' => 'required|exists:halls,id',
            'status' => 'nullable|boolean',
        ];
        Log::info($this->all());
    }


    /**
     * Obtenir les messages de validation personnalisés.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'end_date.after_or_equal' => 'La date de fin doit être égale ou après la date de début.',
            'end_time.after' => 'L\'heure de fin doit être après l\'heure de début.',
        ];
    }
}
