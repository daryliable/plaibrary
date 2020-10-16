<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    const updated_at = null;
    const created_at = null;
    public $timestamps = false;
    protected $guarded = []; 
    protected $fillable = [];
    protected $table = 'genre';

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
