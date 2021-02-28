<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    const updated_at = null;
    const created_at = null;
    public $timestamps = true;
    protected $guarded = []; 
    protected $fillable = ['gender','civil', 'birthdate','address','contact_num','designation','occupation','coll_univ','image_url'];
    protected $table = 'profiles';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
