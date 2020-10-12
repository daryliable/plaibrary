<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{   
    const updated_at = null;
    const created_at = null;
    public $timestamps = true;
    protected $guarded = []; 
    protected $fillable = [];
    protected $table = 'profiles';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
