<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

   const UPDATED_AT = 'last_login';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email_verified_at', 'email', 'password', 'last_login', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

   public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id');
    }

    
   public function not_verified()
   {
     return  $this->email_verified_at == null ? true : false;
   }

    public function Whislist()
    {
      return $this->hasMany(Whislist::class, 'id');
    }

  
}
