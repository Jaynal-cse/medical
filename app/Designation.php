<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Designation extends Model
{
    protected $guarded = [];
	public function connect_to_department_table(){
        return $this->belongsTo('App\Department','department_id');
    }
}
