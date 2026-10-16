<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        Movie::create([
            'title' => 'Your Name',
            'genre' => 'Romance',
            'rating' => 8.8,
            'director' => 'Makoto Shinkai',
            'year' => 2016,
            'is_featured' => true,
        ]);

        Movie::create([
            'title' => 'A Silent Voice',
            'genre' => 'Drama',
            'rating' => 8.1,
            'director' => 'Naoko Yamada',
            'year' => 2016,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Spirited Away',
            'genre' => 'Fantasy',
            'rating' => 8.6,
            'director' => 'Hayao Miyazaki',
            'year' => 2001,
            'is_featured' => true,
        ]);

        Movie::create([
            'title' => 'I Want To Eat Your Pancreas',
            'genre' => 'Drama',
            'rating' => 8.1,
            'director' => 'Shinichiro Ushijima',
            'year' => 2017,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Weathering With You',
            'genre' => 'Romance',
            'rating' => 8.2,
            'director' => 'Makoto Shinkai',
            'year' => 2019,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Princess Mononoke',
            'genre' => 'Action',
            'rating' => 8.4,
            'director' => 'Hayao Miyazaki',
            'year' => 1997,
            'is_featured' => false,
        ]);
    }
}