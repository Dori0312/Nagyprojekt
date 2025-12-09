<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\WatchedMovie;
use App\Models\Rating; // <-- Kell az Eloquent kapcsolatokhoz
use App\Models\Movie; // <-- Jó gyakorlat: Movie is importálva

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * A tömeges hozzárendeléshez engedélyezett attribútumok.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', 
    ];

    /**
     * Az elrejtendő attribútumok.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribútumok típuskényszerítése.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean', // Admin mező casting-ja
        ];
    }

    // ------------------------------------------------------------------
    // KAPCSOLATOK (Relationships)
    // ------------------------------------------------------------------

    /**
     * Egy felhasználóhoz több értékelés tartozhat (1:N kapcsolat).
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class); 
    }

    /**
     * Egy felhasználóhoz több megtekintett film bejegyzés tartozhat (1:N kapcsolat).
     */
    public function watchedMovies(): HasMany
    {
        return $this->hasMany(WatchedMovie::class);
    }
}