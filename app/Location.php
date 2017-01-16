<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "location";
    protected $guarded = ['id'];
    
    public function Floor(){
     	return $this->belongsTo(Floor::class, 'floor_id');
     }
    
    public function Lab(){
     	return $this->belongsTo(Lab::class, 'lab_id');
     }
    
    public function Equipment_Items(){
     	return $this->hasMany(Equipment_Item::class, 'current_location_id');
     }
}
