<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email', 
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/', 
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^a-zA-Z0-9]/',
            ],
        ];
    }
    
    public function messages(): array
    {
        return [
            'name.min' => 'A felhasználónévnek legalább 3 karakter hosszúnak kell lennie!',
            'email.email' => 'Érvénytelen e-mail cím.',
            'email.unique' => 'Ez az e-mail cím már regisztrálva van.',
            'password.min' => 'A jelszónak minimum 8 karakter hosszúságúnak kell lennie.',
            'password.regex' => 'A jelszónak tartalmaznia kell legalább egy nagybetűt, kisbetűt, számot és speciális karaktert.',
        ];
    }
}