<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure_Parameters extends Model
{
     protected $table = "measure_parameters";
    
    protected $guarded = ['id'];

    public function Equipment_Model(){
    	return $this->belongsToMany(Equipment_Model::class, 'model_measureparameters', 'parameter_id', 'model_id');
    }
}
