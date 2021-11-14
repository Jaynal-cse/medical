<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendSection5DepartmentHeading extends Model
{
    protected $guarded = [];

    public function heading_items(){
        return $this->hasMany(FrontendSection5Department::class, 'heading_id', 'id');
    }

    public function scopeActive($query){
        
        return $query->where('status', 1);
    }
}
