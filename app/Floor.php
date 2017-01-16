<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = "floors";
    protected $guarded = ['id'];
    
    public function Location(){
     	return $this->hasMany(Location::class, 'floor_id');
     }
}
