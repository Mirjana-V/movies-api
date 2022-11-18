<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $fillable = [

    'title',
    'director',
    'imageUrl',
    'duration',
    'releaseDate',
    'genre',
    ];


    public static function scopesearchByTitle($query, $title)
    {
        return self::where('title', 'LIKE', '%' . $title . '%');
    }
}
