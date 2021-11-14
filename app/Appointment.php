<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];
    
    
    function rel_to_department_table(){
    	return $this-> belongsTo('App\Department','department');
    }

    function rel_to_doctor_table(){
    	return $this-> belongsTo('App\Doctor','doctor_id');
    }
    
    
    
    
    
    
}
