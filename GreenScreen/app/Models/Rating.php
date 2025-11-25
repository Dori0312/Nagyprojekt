<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// BelongsTo Relation-hoz szükséges:
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    // Megengedjük az adatok beillesztését (mass assignment)
    protected $fillable = [
        'user_id',
        'movie_id',
        'rating',
    ];

    // KAPCSOLAT: Egy értékelés egy felhasználóhoz tartozik.
    /**
     * Get the user that owns the rating.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    // KAPCSOLAT: Egy értékelés egy filmhez tartozik.
    // FIGYELEM: Ehhez a Movie Model-nek (app/Models/Movie.php) is léteznie kell!
    /**
     * Get the movie that the rating belongs to.
     */
    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}