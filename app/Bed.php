<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $guarded = [];
    function get_bedType(){
        return $this->belongsTo('App\Bad_Type','bedType_id');
    }
}
