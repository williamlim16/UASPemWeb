<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['screening_id', 'seat_id', 'user_id', 'created_at'];

    protected $table = 'reservation';

}
