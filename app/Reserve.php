<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = ['id', 'screening_id', 'user_id', 'seat_id'];
    protected $table = 'reservation';
}
