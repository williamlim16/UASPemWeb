<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['id', 'title', 'director', 'sypnosis', 'time', 'age', 'posterpath'];
    protected $casts =  ['categories'=>'array', 'casts'=>'array'];
    protected $table = 'movie';
    protected $casts = [
        'categories' => 'array', //to print categories in movie details page.
        'casts' => 'array' //to print casts in movie details page.
    ];
}
