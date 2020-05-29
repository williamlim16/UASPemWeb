<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    protected $fillable = ['id', 'movie_id', 'date', 'time'];


    protected $table = 'screening';
    public $timestamps = false;

}
