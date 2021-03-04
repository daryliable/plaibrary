<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_user','role_id','user_type','civil','user_id','coll_univ','contact_num','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; 

     protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
            'address' => ' ', 
            ]);
     });
    }
    
    public function profile(){
    return $this->hasOne(Profile::class);
    }
    public function books(){
    return $this->hasMany(Book::class);
    }
}
