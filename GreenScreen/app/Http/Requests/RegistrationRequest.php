<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    
    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'A név megadása kötelező.',
            'email.required' => 'Az e-mail cím megadása kötelező.',
            'email.email' => 'Érvényes e-mail címet adj meg.',
            'email.unique' => 'Ez az e-mail cím már foglalt.',
            'password.required' => 'A jelszó megadása kötelező.',
            'password.min' => 'A jelszónak legalább 8 karakter hosszúnak kell lennie.',
            'password.confirmed' => 'A két jelszó nem egyezik.',
        ];
    }
}