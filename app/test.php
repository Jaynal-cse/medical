<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    public function rel_to_department_table()
    {
        return $this->belongsTo('App\Department','department','id');
    }
}
