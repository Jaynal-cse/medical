<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterOpeningHour extends Model
{
    protected $guarded = [];

    function get_heading()
    {
        return $this->belongsTo('App\FooterHeading','heading_id');
    }
}
