<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['id', 'title', 'director', 'sypnosis', 'duration_min', 'age'];
    protected $table = 'movies';
}
