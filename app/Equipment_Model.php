<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment_Model extends Model
{
    use SoftDeletes;
    
    protected $table = "equipment_model";
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function Equipment_Items(){
    	return $this->hasMany(Equipment_Item::class, 'model_id');
    }
    
    public function User(){
    	return $this->belongsTo(User::class, 'entered_by');
    }
    
    public function Keywords(){
    	return $this->belongsToMany(Keywords::class, 'model_keywords','model_id', 'keyword_id');
    }
    
    public function Measure_Parameters(){
    	return $this->belongsToMany(Measure_Parameters::class, 'model_measureparameters', 'model_id', 'parameter_id');
    }

    
}
