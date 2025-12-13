<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Rating; 
use App\Models\WatchedMovie; 

class Movie extends Model
{

    protected $fillable = [
        'title', 
        'year', 
        'director',     
        'category',      
        'description',   
        'slug',
        'image_path',
    ];

    public function ratings(): HasMany
    {

        return $this->hasMany(Rating::class);
    }

    public function watched(): HasMany
    {

        return $this->hasMany(WatchedMovie::class);
    }
}