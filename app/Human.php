<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    protected $guarded = [];
    function rel_to_designation_table(){
    	return $this-> belongsTo('App\Designation','designation_id', 'id');
    }
}
