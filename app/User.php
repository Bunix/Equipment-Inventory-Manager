<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'jjvc_user_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function Owned_Lab(){
     	return $this->hasMany(Lab::class, 'lab_owner_id');
     }
    
    public function Labs(){
    	return $this->belongsToMany(Lab::class, 'user_labs', 'user_id', 'lab_id');
    }
}
