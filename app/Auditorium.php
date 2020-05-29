<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditorium extends Model
{
    protected $fillable = ['id', 'name', 'seats_no'];
    protected $table = 'auditorium';
}
