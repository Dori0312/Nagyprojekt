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
            'email' => 'required|email',
            'password' => 'required|string',
        ];
    }
    
    public function messages(): array
    {
        return [
            'email.required' => 'Az e-mail cím megadása kötelező!',
            'email.email' => 'Érvénytelen e-mail cím formátum.',
            'password.required' => 'A jelszó megadása kötelező!',
        ];
    }
}