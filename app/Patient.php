<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = [];
	protected $fillable=['phone_no'];
	
	
	function rel_to_doctor_table(){
		return $this->belongsTo('App\Doctor','doctor_id');
	}
}
