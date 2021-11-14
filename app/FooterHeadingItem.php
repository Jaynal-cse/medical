<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterHeadingItem extends Model
{
    protected $guarded = [];

    function get_heading()
    {
        return $this->belongsTo('App\FooterHeading','heading_id');
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
