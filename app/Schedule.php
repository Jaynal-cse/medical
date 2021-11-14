<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];
    
     function rel_to_department_table(){
    	return $this-> belongsTo('App\Department','department_id');
    }
  
    function rel_to_doctor_table(){
    	return $this-> belongsTo('App\Doctor','doctor_id');
    }
	
	function re_to_day_table(){
		return $this->belongsTo('App\Day','day');
	}
    
    
    
    
    
    
    
}
