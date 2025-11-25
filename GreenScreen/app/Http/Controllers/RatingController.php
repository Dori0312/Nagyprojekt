<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Store a newly created rating in storage (or update an existing one).
     *
     * @param  \App\Http\Requests\StoreRatingRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRatingRequest $request)
    {
        // A validáció már lefutott a StoreRatingRequest által.
        
        // Lekérjük az adatokat a validált kérésből
        $validatedData = $request->validated();
        
        // A felhasználó azonosítója (auth()->id() csak bejelentkezett felhasználóknak működik)
        $userId = auth()->id();
        
        try {
            // Megpróbáljuk megtalálni a felhasználó meglévő értékelését ehhez a filmhez.
            // Ha létezik, frissítjük, ha nem, létrehozzuk.
            
            // NOTE: A 'user_id' és 'movie_id' egyedi indexet kapott a migrációban!
            $rating = Rating::updateOrCreate(
                [
                    'user_id' => $userId, 
                    'movie_id' => $validatedData['movie_id']
                ],
                [
                    'rating' => $validatedData['rating']
                ]
            );

            // Sikeres mentés esetén visszairányítunk a film oldalára (vagy ahova szükséges)
            return back()->with('success', 'Értékelés sikeresen elmentve/frissítve!');

        } catch (\Exception $e) {
            // Hiba esetén (pl. adatbázis probléma)
            // Hibaüzenet naplózása a logokba (opcionális)
            // \Log::error('Rating Mentési hiba: ' . $e->getMessage()); 
            
            return back()->with('error', 'Hiba történt az értékelés mentésekor. Kérlek próbáld újra.');
        }
    }
}