<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];
    protected $casts = [
        'working_days' => 'array',
    ];
    
    function get_department()
    {
        return $this->belongsTo('App\Department', 'department');
    }
	function get_designation()
    {
        return $this->belongsTo('App\Designation', 'designation');
    }
    
     function rel_to_dept_table(){
    	return $this-> belongsTo('App\Department','department', 'id');
    }
	function re_to_day_table(){
		return $this->belongsTo('App\Day','day');
	}
    
    
    
}
