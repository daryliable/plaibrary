<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    const updated_at = null;
    const created_at = null;
    public $timestamps = true;
    protected $guarded = []; 
    protected $fillable = [];
    protected $table = 'reservations'; //
}
