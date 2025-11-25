<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    // Megengedjük az adatok beillesztését
    protected $fillable = [
        // Ide kerülnének a filmek oszlopai, pl. 'title', 'release_year'
    ];
    
    // KAPCSOLAT: Egy filmnek több értékelése lehet.
    /**
     * Get the ratings for the movie.
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}