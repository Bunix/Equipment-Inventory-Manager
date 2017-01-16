<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment_Item extends Model
{
    use SoftDeletes;
    
    protected $table = "equipment_item";
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

     public function Equipment_Model(){
     	return $this->belongsTo(Equipment_Model::class , 'model_id');
     }
    
    public function User(){
    	return $this->belongsTo(User::class, 'entered_by');
    }
    
    public function Lab(){
     	return $this->belongsTo(Lab::class, 'owned_by_lab_id');
     }
    
    public function Location(){
     	return $this->belongsTo(Location::class, 'current_location_id');
     }
    
    public function Parts(){
    	return $this->hasMany(Parts::class, 'item_id');
    }
}
