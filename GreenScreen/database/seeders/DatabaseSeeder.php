<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), 
            ]
        );

        Movie::insert([
            [
                'title' => '28 days later', 
                'slug' => '28dayslater', 
                'image_path' => 'film_kepek/28_nappal_kesobb.jpg',
                'year' => 2002,
                'director' => 'Danny Boyle',
                'category' => 'Horror',
                'description' => 'A járvány elpusztítja a civilizációt.',
            ],
            
            [
                'title' => 'Deadpool', 
                'slug' => 'deadpool', 
                'image_path' => 'film_kepek/deadpool.png',
                'year' => 2016, 
                'director' => 'Tim Miller',
                'category' => 'Akció',
                'description' => 'Egy különleges kommandósból zsoldos lesz.',
            ],
            ['title' => 'Fight Club', 'slug' => 'fightclub', 'image_path' => 'film_kepek/harcosok_klubja.jpg', 'year' => 1999, 'director' => 'David Fincher', 'category' => 'Dráma', 'description' => 'Egy álmatlanságban szenvedő irodai dolgozó...'],
            ['title' => 'Joker', 'slug' => 'joker', 'image_path' => 'film_kepek/joker.jpg', 'year' => 2019, 'director' => 'Todd Phillips', 'category' => 'Thriller', 'description' => 'Egy mentálisan instabil komikus...'],
            ['title' => 'Shrek', 'slug' => 'shrek', 'image_path' => 'film_kepek/shrek.jpg', 'year' => 2001, 'director' => 'Andrew Adamson', 'category' => 'Animáció', 'description' => 'Egy ogre, aki megmenti a hercegnőt.'],
            ['title' => 'Elkurtuk', 'slug' => 'elkurtuk', 'image_path' => 'film_kepek/elkurtuk.jpg', 'year' => 2011, 'director' => 'Goda Krisztina', 'category' => 'Politikai dráma', 'description' => 'A 2006-os eseményeket feldolgozó film.'],
            
        ]);
    }
}