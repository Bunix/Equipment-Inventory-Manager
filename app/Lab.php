<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    
    protected $table = "lab";
    protected $guarded = ['id'];
    
    
    public function Equipment_Items(){
        
     	return $this->hasMany(Equipment_Item::class, 'owned_by_lab_id');
     }
    
    public function Location(){
        
     	return $this->hasMany(Location::class);
     }
    
    public function Lab_Owner(){
        
     	return $this->belongsTo(User::class, 'lab_owner_id');
     }
    
    public function Members(){
    	return $this->belongsToMany(User::class, 'user_labs', 'lab_id', 'user_id');
    }
}
