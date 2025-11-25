<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRatingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Engedélyezzük-e a kérést? Csak a bejelentkezett felhasználók értékelhetnek.
     */
    public function authorize(): bool
    {
        // Feltételezzük, hogy a bejelentkezés már működik.
        // Csak a bejelentkezett felhasználók engedélyezettek.
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     * Validációs szabályok az 1-5 csillagos értékeléshez.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // A 'movie_id' mezőre azért van szükség, hogy tudjuk, melyik filmet értékeli.
            'movie_id' => 'required|exists:movies,id',

            // A 'rating' mezőre:
            // 1. Kötelező
            // 2. Egész szám
            // 3. Minimum 1
            // 4. Maximum 5
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    /**
     * Custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'movie_id.required' => 'A film azonosítója kötelező.',
            'movie_id.exists' => 'A megadott film nem található az adatbázisban.',
            'rating.required' => 'Az értékelés csillagainak száma kötelező.',
            'rating.integer' => 'Az értékelésnek egész számnak kell lennie.',
            'rating.min' => 'Az értékelés minimum 1 csillag lehet.',
            'rating.max' => 'Az értékelés maximum 5 csillag lehet.',
        ];
    }
}