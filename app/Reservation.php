<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['screening_id', 'seat_id', 'user_id', 'created_at'];

    protected $primaryKey = ['screening_id', 'seat_id'];
    
    protected $table = 'reservation';

    public $timestamps = false;

}
