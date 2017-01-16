<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    protected $table = "keywords";
    
    protected $guarded = ['id'];
    
    public function Equipment_Model(){
    	return $this->belongsToMany(Equipment_Model::class, 'model_keywords', 'keyword_id', 'model_id');
    }
}
