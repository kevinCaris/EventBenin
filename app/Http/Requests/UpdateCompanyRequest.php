<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('companies')->ignore($this->company->id)], // Unique sauf pour l'entreprise actuelle
            'phone' => ['required', 'string', 'max:20'], // Obligatoire, chaîne, limite de 20 caractères
            'address' => ['required', 'string', 'max:500'], // Adresse obligatoire, max 500 caractères
            'ville' => ['nullable', 'string', 'max:255'], // Ville obligatoire
            'pays' => ['nullable', 'string', 'max:255'], // Pays obligatoire
            'description' => ['nullable', 'string', 'max:1000'], // Description optionnelle, chaîne max 1000 caractères
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:3048'], // Avatar image, formats acceptés, max 2 MB
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:3048'], // Cover image, formats acceptés, max 2 MB
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
    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',

            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.string' => 'L\'adresse e-mail doit être une chaîne de caractères.',
            'email.email' => 'Veuillez saisir une adresse e-mail valide.',
            'email.max' => 'L\'adresse e-mail ne doit pas dépasser 255 caractères.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',

            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',

            'address.required' => 'L\'adresse est obligatoire.',
            'address.string' => 'L\'adresse doit être une chaîne de caractères.',
            'address.max' => 'L\'adresse ne doit pas dépasser 500 caractères.',

            'ville.string' => 'La ville doit être une chaîne de caractères.',
            'ville.max' => 'La ville ne doit pas dépasser 255 caractères.',

            'pays.string' => 'Le pays doit être une chaîne de caractères.',
            'pays.max' => 'Le pays ne doit pas dépasser 255 caractères.',

            'description.string' => 'La description doit être une chaîne de caractères.',
            'description.max' => 'La description ne doit pas dépasser 1000 caractères.',

            'avatar.image' => 'L\'avatar doit être une image.',
            'avatar.mimes' => 'L\'avatar doit être de type : jpeg, png, jpg, gif, svg ou webp.',
            'avatar.max' => 'L\'avatar ne doit pas dépasser 3 Mo.',

            'cover.image' => 'L\'image de couverture doit être une image.',
            'cover.mimes' => 'L\'image de couverture doit être de type : jpeg, png, jpg, gif, svg ou webp.',
            'cover.max' => 'L\'image de couverture ne doit pas dépasser 3 Mo.',

            'postal_code.string' => 'Le code postal doit être une chaîne de caractères.',
            'postal_code.max' => 'Le code postal ne doit pas dépasser 10 caractères.',

            'facebook_url.url' => 'L\'URL Facebook doit être valide.',
            'facebook_url.max' => 'L\'URL Facebook ne doit pas dépasser 255 caractères.',

            'twitter_url.url' => 'L\'URL Twitter doit être valide.',
            'twitter_url.max' => 'L\'URL Twitter ne doit pas dépasser 255 caractères.',

            'instagram_url.url' => 'L\'URL Instagram doit être valide.',
            'instagram_url.max' => 'L\'URL Instagram ne doit pas dépasser 255 caractères.',

            'website_url.url' => 'L\'URL du site web doit être valide.',
            'website_url.max' => 'L\'URL du site web ne doit pas dépasser 255 caractères.',

            'linkedin_url.url' => 'L\'URL LinkedIn doit être valide.',
            'linkedin_url.max' => 'L\'URL LinkedIn ne doit pas dépasser 255 caractères.',

            'youtube_url.url' => 'L\'URL YouTube doit être valide.',
            'youtube_url.max' => 'L\'URL YouTube ne doit pas dépasser 255 caractères.',

            'tiktok_url.url' => 'L\'URL TikTok doit être valide.',
            'tiktok_url.max' => 'L\'URL TikTok ne doit pas dépasser 255 caractères.',
        ];
    }
}
