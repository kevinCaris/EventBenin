<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StoreHallRequest extends FormRequest
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
                'title' => 'required|string|max:255',
                'description' => 'required|string|min:10',
                'capacity' => 'required|integer|min:1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'website' => 'nullable|url',
                'price' => 'required|numeric|min:0',
                'status' => 'nullable|string', // Base sur les valeurs de StatusHallEnum
                'tarification' => 'required|string|min:0',
                'company_id' => 'nullable|exists:companies,id',
            ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Le titre de la salle est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'capacity.required' => 'La capacité de la salle est obligatoire.',
            'capacity.integer' => 'La capacité doit être un nombre entier.',
            'price.required' => 'Le prix est obligatoire.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'price.min' => 'Le prix doit être supérieur ou égal à 0.',
            'country.required' => 'Le pays est obligatoire.',
            'city.required' => 'La ville est obligatoire.',
            'address.required' => 'L\'adresse est obligatoire.',
            'latitude.required' => 'La latitude est obligatoire.',
            'longitude.required' => 'La longitude est obligatoire.',
            'status.in' => 'Le statut fourni est invalide.',
            'company_id.required' => 'L\'ID de la compagnie est obligatoire.',
            'company_id.exists' => 'L\'ID de la compagnie n\'existe pas.',
            'tarification.required' => 'La tarification est obligatoire.',
            'tarification.text' => 'La tarification doit contenir du texte.',
        ];
    }
}
