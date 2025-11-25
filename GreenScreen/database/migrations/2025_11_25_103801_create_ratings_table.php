<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            // A tábla elsődleges kulcsa
            $table->id(); 
            
            $table->foreignId('user_id')
                  ->constrained() // Biztosítja, hogy az ID létezzen a 'users' táblában
                  ->onDelete('cascade'); // Ha a felhasználó törlődik, az értékelései is törlődnek
            
            $table->foreignId('movie_id')
                  ->constrained() // Biztosítja, hogy az ID létezzen a 'movies' táblában
                  ->onDelete('cascade'); // Ha a film törlődik, az értékelései is törlődnek

            $table->tinyInteger('rating')->unsigned(); 

            // Megakadályozzuk, hogy egy felhasználó kétszer értékelje ugyanazt a filmet
            $table->unique(['user_id', 'movie_id']);
            
            // Létrehozás és frissítés időpontjai
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};