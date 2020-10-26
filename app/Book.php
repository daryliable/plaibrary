<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const updated_at = null;
    const created_at = null;
    public $timestamps = true;
    protected $guarded = []; 
    protected $fillable = ['book_name','book_description','genre_id','book_author','book_publisher','date_published','image_url','book_quantity'];  
    protected $table = 'books';

    public function genre()
      {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
     public function user(){
        return $this->belongsTo(User::class);
    }
}
