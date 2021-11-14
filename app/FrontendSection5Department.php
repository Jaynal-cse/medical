<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendSection5Department extends Model
{
    protected $guarded = [];

    function get_heading(){
        return $this->belongsTo('App\FrontendSection5DepartmentHeading','heading_id','id');
    }

    public function scopeActive($query){
        
        return $query->where('status', 1);
    }
}
