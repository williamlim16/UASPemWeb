<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['id', 'title', 'director', 'sypnosis', 'time', 'age', 'categories', 'casts', 'posterpath', 'trailer'];
    protected $casts =  ['categories' => 'array', 'casts' => 'array'];
    protected $table = 'movie';
    public $timestamps = false;
}
