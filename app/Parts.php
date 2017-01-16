<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    protected $table = "parts";
    protected $guarded = ['id'];

    public function Equipment_Item(){
    	return $this->belongsTo(Equipment_Item::class, 'item_id');
    }
}
