<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Csak az e-mailt és a jelszót kell kérni bejelentkezéshez
            'emailcim' => 'required|email',
            'jelszo' => 'required|string',
        ];
    }
    
    public function messages(): array
    {
        return [
            'emailcim.required' => 'Az e-mail cím megadása kötelező!',
            'emailcim.email' => 'Érvénytelen e-mail cím formátum.',
            'jelszo.required' => 'A jelszó megadása kötelező!',
        ];
    }
}