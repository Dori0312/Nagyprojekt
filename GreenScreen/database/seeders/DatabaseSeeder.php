<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Movie::insert([
            (object)['title' => '28 days later', 'slug' => '28dayslater', 'image_path' => 'film_kepek/28_nappal_kesobb.jpg'],
            (object)['title' => 'Deadpool', 'slug' => 'deadpool', 'image_path' => 'film_kepek/deadpool.png'],
            (object)['title' => 'Fight Club', 'slug' => 'fightclub', 'image_path' => 'film_kepek/harcosok_klubja.jpg'],
            (object)['title' => 'Joker', 'slug' => 'joker', 'image_path' => 'film_kepek/joker.jpg'],
            (object)['title' => 'Shrek', 'slug' => 'shrek', 'image_path' => 'film_kepek/shrek.jpg'],
            (object)['title' => 'Elkurtuk', 'slug' => 'elkurtuk', 'image_path' => 'film_kepek/elkurtuk.jpg'],
        ]);
    }
}
