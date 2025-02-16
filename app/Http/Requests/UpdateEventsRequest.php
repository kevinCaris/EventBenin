<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;


class UpdateEventsRequest extends FormRequest
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
    Log::info($this->all());
    return [
        'event_type' => 'nullable|string|max:255',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'start_time' => 'nullable|date_format:H:i:s',
        'end_time' => 'nullable|date_format:H:i:s|after:start_time',
        'amount' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'details' => 'nullable|string',
        'hall_id' => 'nullable|exists:halls,id',
        'status' => 'nullable|in:0,1,2',
    ];
}


    /**
     * Obtenir les messages de validation personnalisés.
     *
     * @return array
     */
    public function messages(): array
{
    return [
        'event_type.nullable' => 'Le type d\'événement est optionnel.',
        'event_type.string' => 'Le type d\'événement doit être une chaîne de caractères.',
        'event_type.max' => 'Le type d\'événement ne doit pas dépasser 255 caractères.',

        'start_date.nullable' => 'La date de début est optionnelle.',
        'start_date.date' => 'La date de début doit être une date valide.',
        'start_date.after_or_equal' => 'La date de début doit être aujourd\'hui ou une date future.',

        'end_date.nullable' => 'La date de fin est optionnelle.',
        'end_date.date' => 'La date de fin doit être une date valide.',
        'end_date.after_or_equal' => 'La date de fin doit être égale ou après la date de début.',

        'start_time.nullable' => 'L\'heure de début est optionnelle.',
        'start_time.date_format' => 'L\'heure de début doit être au format HH:MM.',

        'amount.nullable' => 'Le montant est optionnel.',
        'amount.numeric' => 'Le montant doit être un nombre valide.',
        'amount.regex' => 'Le montant doit avoir jusqu\'à deux décimales.',

        'end_time.nullable' => 'L\'heure de fin est optionnelle.',
        'end_time.date_format' => 'L\'heure de fin doit être au format HH:MM.',
        'end_time.after' => 'L\'heure de fin doit être après l\'heure de début.',

        'details.nullable' => 'Les détails sont optionnels.',
        'details.string' => 'Les détails doivent être une chaîne de caractères.',

        'hall_id.nullable' => 'La salle est optionnelle.',
        'hall_id.exists' => 'La salle sélectionnée n\'existe pas.',

        'status.nullable' => 'Le statut est optionnel.',
        'status.in' => 'Le statut doit être l\'un des suivants : En attente, Confirmé, Annulé.',
    ];
}

}
