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
            'felhasznalonev' => 'required|string|min:3',
            'emailcim' => 'required|email|unique:users,email', 
            'jelszo' => [
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
            'felhasznalonev.min' => 'A felhasználónévnek legalább 3 karakter hosszúnak kell lennie!',
            'emailcim.email' => 'Érvénytelen e-mail cím.',
            'emailcim.unique' => 'Ez az e-mail cím már regisztrálva van.',
            'jelszo.min' => 'A jelszónak minimum 8 karakter hosszúságúnak kell lennie.',
            'jelszo.regex' => 'A jelszónak tartalmaznia kell legalább egy nagybetűt, kisbetűt, számot és speciális karaktert.',
        ];
    }
}