<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onlineappointment extends Model
{
    protected $guarded = [];

    function rel_to_doctor_table(){
    	return $this-> belongsTo('App\Doctor','doctor_id', 'id');
    }
    function rel_to_dept_table(){
    	return $this-> belongsTo('App\Department','department_id', 'id');
    }


}
