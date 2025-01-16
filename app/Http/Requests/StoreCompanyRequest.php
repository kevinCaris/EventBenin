<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'], // Obligatoire, chaîne, max 255 caractères
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies')], // Unique sauf pour l'entreprise actuelle
            'phone' => ['required', 'string', 'max:20'], // Obligatoire, chaîne, limite de 20 caractères
            'address' => ['required', 'string', 'max:500'], // Adresse obligatoire, max 500 caractères
            'ville' => ['nullable', 'string', 'max:255'], // Ville obligatoire
            'pays' => ['nullable', 'string', 'max:255'], // Pays obligatoire
            'description' => ['nullable', 'string', 'max:1000'], // Description optionnelle, chaîne max 1000 caractères
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Avatar image, formats acceptés, max 2 MB
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Cover image, formats acceptés, max 2 MB
            'postal_code' => ['nullable', 'string', 'max:10'], // Code postal optionnel, max 10 caractères
            'facebook_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour Facebook
            'twitter_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour Twitter
            'instagram_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour Instagram
            'website_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour le site web
            'linkedin_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour LinkedIn
            'youtube_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour YouTube
            'tiktok_url' => ['nullable', 'string', 'url', 'max:255'], // URL valide pour TikTok
        ];
    }
}
