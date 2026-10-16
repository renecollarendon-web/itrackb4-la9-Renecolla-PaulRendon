<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'genre',
        'rating',
        'director',
        'year',
        'is_featured',
        'remarks',
    ];
    
    protected function casts(): array
{
    return [
        'rating' => 'integer',
        'year' => 'integer',
        'is_featured' => 'boolean',
    ];
}
}
