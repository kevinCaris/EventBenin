<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreHallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->isAdmin() || Auth::user()->isOwner();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
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
                'capacity_min' => 'required|integer|min:1',
                'capacity_max' => 'required|integer|min:1',
                'price_min' => 'required|numeric|min:0',
                'price_max' => 'required|numeric|min:0',
                'status' => 'required|numeric', // Basé sur les valeurs de StatusHallEnum
                'company_id' => 'required|exists:companies,id',
            ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Le titre de la salle est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'capacity.required' => 'La capacité de la salle est obligatoire.',
            'capacity.integer' => 'La capacité doit être un nombre entier.',
            'capacity.min' => 'La capacité doit être au moins 1.',
            'price.required' => 'Le prix est obligatoire.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'price.min' => 'Le prix doit être supérieur ou égal à 0.',
            'status.in' => 'Le statut fourni est invalide.',
            'company_id.required' => 'L\'ID de la compagnie est obligatoire.',
            'company_id.exists' => 'L\'ID de la compagnie n\'existe pas.',
        ];
    }
}
