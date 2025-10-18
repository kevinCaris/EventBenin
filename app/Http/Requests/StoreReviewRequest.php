<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'hall_id' => 'required|exists:halls,id',
            'nom' => 'required_if:user_id,null|max:255',
            'email' => 'nullable|email',
            'commentaire' => 'required|min:5',
            'note' => 'required|integer|min:1|max:5',
        ];
    }
}
